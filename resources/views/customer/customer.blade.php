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
            <h5 class="card-header">Customer</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="d-flex me-2">
                {{-- Search --}}
                <form action="{{ url('/customer') }}" method="GET" class="me-2 me-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Search..."
                            aria-label="Search..." aria-describedby="basic-addon-search31"
                            value="{{ request('search') }}" />
                    </div>
                </form>
                {{-- End Search --}}
                <!-- Button  create -->
                <a href="{{ url('customer/create') }}" class="btn btn-primary text-uppercase">ADD</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Company Name</th>
                    {{-- <th>Company Address</th> --}}
                    <th>Phone</th>
                    {{-- <th>NPWP</th> --}}
                    {{-- <th>Deal Name</th>
                    <th>Position</th>
                    <th>No Handphone</th>
                    <th>Email Deal Name</th>
                    <th>Pic Technical Name</th>
                    <th>Positon PICT</th>
                    <th>Phone PICT</th>
                    <th>Email PICT</th>
                    <th>Pic Finance Name</th>
                    <th>Position PICF</th>
                    <th>Phone PICF</th>
                    <th>Email PICF </th>
                    <th>Service</th>
                    <th>Project</th>
                    <th>Bandwidth</th> --}}
                    <th>Node A</th>
                    <th>Node B</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->created_at->format('D M Y') }}</td>
                    <td>{{ $row->companyname }}</td>
                    {{-- <td>{{ $row->companyaddress }}</td> --}}
                    <td>{{ $row->phone }}</td>
                    {{-- <td>{{ $row->npwp }}</td> --}}
                    {{-- <td>{{ $row->dealname }}</td>
                    <td>{{ $row->position }}</td>
                    <td>{{ $row->nohandphone }}</td>
                    <td>{{ $row->emaildealname }}</td>
                    <td>{{ $row->service }}</td>
                    <td>{{ $row->project }}</td>
                    <td>{{ $row->bandwidth }}</td> --}}
                    <td>{{ $row->center->data_center }}</td>
                    <td>{{ $row->stasiun->nama_stasiun }}</td>
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
                            <a href="{{ ('customer/'.$row->id.'/edit') }}" class="btn btn-warning btn-sm"><i class='bx bxs-edit-alt'></i></a>
                        </div>
                        <form method="POST" action="{{ url('customer/'.$row->id) }}">
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
    @foreach ($data as $customer)
<!-- Modal -->
    <form method="GET">
        <div class="modal fade" id="modalCenter3-{{ $customer->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase" id="exampleModalLabel3">Show Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Company Name</label>
                                <input type="text" name="companyname" value="{{ $customer->companyname }}"
                                    class="form-control" placeholder="Company Name" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Company Address</label>
                                <input type="text" name="companyaddress" value="{{ $customer->companyaddress }}"
                                    class="form-control" placeholder="Company Address" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Phone</label>
                                <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control"
                                    placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">NPWP</label>
                                <input type="text" name="npwp" value="{{ $customer->npwp }}" class="form-control"
                                    placeholder="NPWP" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Deal Name</label>
                                <input type="text" name="dealname" value="{{ $customer->dealname }}" class="form-control"
                                    placeholder="Deal Name" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Position</label>
                                <input type="text" name="position" value="{{ $customer->position }}" class="form-control"
                                    placeholder="Position" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">No Handphone</label>
                                <input type="text" name="nohandphone" value="{{ $customer->nohandphone }}"
                                    class="form-control" placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Email Deal Name</label>
                                <input type="text" name="emaildealname" value="{{ $customer->emaildealname }}"
                                    class="form-control" placeholder="dealname@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Pic Technical Name</label>
                                <input type="text" name="pictechnicalname" value="{{ $customer->pictechnicalname }}"
                                    class="form-control" placeholder="Pict Name" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Pic Finace Name</label>
                                <input type="text" name="picfinacename" value="{{ $customer->picfinacename }}"
                                    class="form-control" placeholder="Picf Name" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Position PICT</label>
                                <input type="text" name="position_pict" value="{{ $customer->position_pict }}"
                                    class="form-control" placeholder="Position Pict" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Position PICF</label>
                                <input type="text" name="position_picf" value="{{ $customer->position_picf }}"
                                    class="form-control" placeholder="Position Picf" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Phone PICT</label>
                                <input type="text" name="phone_pict" value="{{ $customer->phone_pict }}"
                                    class="form-control" placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Phone PICF</label>
                                <input type="text" name="phone_picf" value="{{ $customer->phone_picf }}"
                                    class="form-control" placeholder="081234567" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Email PICT</label>
                                <input type="text" name="email_pict" value="{{ $customer->email_pict }}"
                                    class="form-control" placeholder="pict@gmail.com" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Email PICF</label>
                                <input type="text" name="email_picf" value="{{ $customer->email_picf }}"
                                    class="form-control" placeholder="picf@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Node A</label>
                                <input type="text" name="center_id" value="{{ $customer->center->data_center }}"
                                    class="form-control" placeholder="Bandung" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Node B</label>
                                <input type="text" name="stasiun_id" value="{{ $customer->stasiun->nama_stasiun }}" class="form-control"
                                    placeholder="Jakarta" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Service</label>
                                <input type="text" name="service" value="{{ $customer->service }}" class="form-control"
                                    placeholder="Service" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Project</label>
                                <input type="text" name="project" value="{{ $customer->project }}" class="form-control"
                                    placeholder="Project" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Bandwidth</label>
                                <input type="text" name="bandwidth" value="{{ $customer->bandwidth }}" class="form-control"
                                    placeholder="Bandwidth" disabled>
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

