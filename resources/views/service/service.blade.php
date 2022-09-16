@extends('layouts.partials.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('edit'))
<div class="alert alert-warning alert-dismissible" role="alert">
    {{ session('edit') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('delete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="row">
        <div class="col-6">
            <h5 class="card-header">Service</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="d-flex me-2">
                {{-- Search --}}
                <form action="{{ url('/service') }}" method="GET" class="me-2 me-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Search..."
                            aria-label="Search..." aria-describedby="basic-addon-search31"
                            value="{{ request('search') }}" />
                    </div>
                </form>
                {{-- End Search --}}
                <!-- Button  create -->
                <a href="{{ url('service/create') }}" class="btn btn-primary text-uppercase">ADD</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Company Name</th>
                    {{-- <th>Status</th> --}}
                    <th>Node A</th>
                    <th>Status Node A</th>
                    {{-- <th>Rack Node A</th>
                    <th>Switch Node A</th>
                    <th>Request Number Node A</th>
                    <th>Label Node A</th>
                    <th>Kabel Lenght Node A</th> --}}
                    <th>Node B</th>
                    <th>Status Node B</th>
                    {{-- <th>Rack Node B</th>
                    <th>Switch Node B</th>
                    <th>Request Number Node B</th>
                    <th>Label Node B</th>
                    <th>Kabel Lenght Node B</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->customer->companyname }}</td>
                    <td>{{ $row->center->data_center }}</td>
                    <td>{{ $row->status_node_a }}</td>
                    <td>{{ $row->stasiun->nama_stasiun }}</td>
                    <td>{{ $row->status_node_b }}</td>
                    <td class="d-flex">
                        <div class="me-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalCenter3-{{ $row->id }}">
                                <i class='bx bxs-show'></i>
                            </button>
                        </div>
                        <div class="me-2">
                            <!-- Button trigger modal -->
                            <a href="{{ ('service/'.$row->id.'/edit') }}" class="btn btn-warning btn-sm"><i class='bx bxs-edit-alt'></i></a>
                        </div>
                        <form method="POST" action="{{ url('service/'.$row->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-2 me-lg-3 me-2">
            {{ $data->onEachSide(1)->links() }}
        </div>
    </div>
@foreach ($data as $service)
    <!-- Modal -->
    <form method="GET">
        <div class="modal fade" id="modalCenter3-{{ $service->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase" id="exampleModalLabel3">Show Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Company Name</label>
                                <input type="text" name="customer_id" value="{{ $service->customer->companyname }}" class="form-control" placeholder="Company Name" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Node A</label>
                                <input type="text" name="center_id" value="{{ $service->center->data_center }}" class="form-control" placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Node B</label>
                                <input type="text" name="stasiun_id" value="{{ $service->stasiun->nama_stasiun }}" class="form-control" placeholder="NPWP" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Status Node A</label>
                                <input type="text" name="status_node_a" value="{{ $service->status_node_a }}" class="form-control"
                                    placeholder="Deal Name" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Status Node B</label>
                                <input type="text" name="position" value="{{ $service->status_node_a }}" class="form-control"
                                    placeholder="Position" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Detail Status Node A</label>
                                <input type="text" name="nohandphone" value="{{ $service->detail_status_node_a }}" class="form-control"
                                    placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">DETAIL STATUS NODE B</label>
                                <input type="text" name="emaildealname" value="{{ $service->detail_status_node_b }}"
                                    class="form-control" placeholder="dealname@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">LOCATION NODE A</label>
                                <input type="text" name="pictechnicalname" value="{{ $service->location_node_a }}"
                                    class="form-control" placeholder="Pict Name" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">LOCATION NODE B</label>
                                <input type="text" name="picfinacename" value="{{ $service->location_node_b }}"
                                    class="form-control" placeholder="Picf Name" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">RACK NODE A</label>
                                <input type="text" name="position_pict" value="{{ $service->rack_node_a }}"
                                    class="form-control" placeholder="Position Pict" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">RACK NODE B</label>
                                <input type="text" name="position_picf" value="{{ $service->rack_node_b }}"
                                    class="form-control" placeholder="Position Picf" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">SWICTH NODE A</label>
                                <input type="text" name="position_pict" value="{{ $service->swicth_node_a }}"
                                    class="form-control" placeholder="Position Pict" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">SWICTH NODE B</label>
                                <input type="text" name="position_picf" value="{{ $service->switch_node_b }}"
                                    class="form-control" placeholder="Position Picf" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">REQUEST NUMBER NODE A</label>
                                <input type="text" name="position_pict" value="{{ $service->request_number_node_a }}"
                                    class="form-control" placeholder="Position Pict" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">REQUEST NUMBER NODE B</label>
                                <input type="text" name="position_picf" value="{{ $service->request_number_node_b }}"
                                    class="form-control" placeholder="d" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">LABEL NODE A</label>
                                <input type="text" name="center_id" value="{{ $service->label_node_a }}"
                                    class="form-control" placeholder="Bandung" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">LABEL NODE B</label>
                                <input type="text" name="stasiun_id" value="{{ $service->label_node_b }}"
                                    class="form-control" placeholder="Jakarta" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">CABLE LENGHT NODE A</label>
                                <input type="text" name="center_id" value="{{ $service->cable_lenght_node_a }}"
                                    class="form-control" placeholder="Bandung" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">CABLE LENGHT NODE B</label>
                                <input type="text" name="stasiun_id" value="{{ $service->cable_lenght_node_b }}"
                                    class="form-control" placeholder="Jakarta" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
</div>
</div>
@endsection
