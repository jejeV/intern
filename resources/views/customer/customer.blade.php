@extends('layouts.partials.main')

@push('head')
    <style>
        #searchIcon{
            background: transparent;
            border: none;
            outline: none;
            margin: 0 !important;
        }

        @media (max-width: 789px){
            #btn{
                margin-top: 0.5rem;
            }
        }

        @media (max-width: 576px){
            #btn{
                width: 48.3833px !important;
                height: 27.7px !important;
                padding: 4px 11px;           
                font-size: 10px;
            }
        }
    </style>
@endpush

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
    <div class="row align-items-center">
        <div class="col-6">
            <h5 class="card-header">Customer</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="me-2">
                <div class="d-flex flex-wrap me-2 justify-content-end">
                    {{-- Search --}}
                    <form action="{{ url('/customer') }}" method="GET" class="me-2 me-lg-3" id="formSearch">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31">
                                <button type="submit" id="searchIcon"><i class="bx bx-search text-primary"></i></button>
                            </span>
                            <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" value="{{ request('search') }}" id="inputSearch" />
                        </div>
                    </form>
                    {{-- End Search --}}
                    <!-- Button  create -->
                    <a href="{{ url('customer/create') }}" class="btn btn-primary text-uppercase mt-lg-0 me-2 me-md-2 me-lg-0" id="btn">ADD</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Company Name</th>
                    <th>Status</th>
                    <th>Node A</th>
                    <th>Node B</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($data as $index => $row)
                    <tr>
                        <input type="hidden" class="delete_id" value="{{ $row->id }}">
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        {{-- <td>{{ $row->created_at->format('D, M Y') }}</td> --}}
                        <td>{{ $row->companyname }}</td>
                        <td><span class="{{ ($row->status == 'aktif')? 'badge bg-label-success' : 'badge bg-label-danger' }}">{{ ($row->status == 'aktif')? 'Aktif' : 'Tidak Aktif' }}</span></td>
                        <td>{{ $row->node_a }}</td>
                        <td>{{ $row->node_b }}</td>
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
                                <button type="submit" class="btn btn-danger btn-sm btndelete"><i class='bx bx-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="9" class="text-center">Result not found.</th>
                    </tr>
                @endforelse
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
                                <label for="nameLarge" class="form-label">Sales Name</label>
                                <input type="text" name="salesname" value="{{ $customer->salesname }}"
                                    class="form-control" placeholder="Company Address" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Node A</label>
                                <input type="text" name="node_a" value="{{ $customer->node_a }}" class="form-control"
                                    placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Node B</label>
                                <input type="text" name="node_b" value="{{ $customer->node_b }}" class="form-control"
                                    placeholder="NPWP" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Ring</label>
                                <input type="text" name="ring" value="{{ $customer->ring }}"
                                    class="form-control" placeholder="Deal Name" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Pair</label>
                                <input type="text" name="pair" value="{{ $customer->pair }}"
                                    class="form-control" placeholder="Position" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">KM</label>
                                <input type="text" name="km" value="{{ $customer->km }}"
                                    class="form-control" placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">SO</label>
                                <input type="text" name="so" value="{{ $customer->so }}"
                                    class="form-control" placeholder="dealname@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">CID</label>
                                <input type="text" name="cid" value="{{ $customer->cid }}"
                                    class="form-control" placeholder="Pict Name" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">SID</label>
                                <input type="text" name="sid" value="{{ $customer->sid }}"
                                    class="form-control" placeholder="Picf Name" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Net Active</label>
                                <input type="text" name="net_active" value="{{ $customer->net_active }}"
                                    class="form-control" placeholder="Position Pict" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Active Date</label>
                                @if ($customer->active_date == "")
                                    <input type="text" name="active_date" value="Customer belum Active" class="form-control" placeholder="Position Picf" disabled>
                                @else
                                    <input type="text" name="active_date" value="{{ $customer->active_date->format('d M Y') }}" class="form-control" placeholder="Position Picf" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">HH Access</label>
                                <input type="text" name="hh_access" value="{{ $customer->hh_access }}"
                                    class="form-control" placeholder="081234567" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Backbone</label>
                                <input type="text" name="backbone" value="{{ $customer->backbone }}"
                                    class="form-control" placeholder="081234567" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Update Node A</label>
                                <input type="text" name="update_node_a" value="{{ $customer->update_node_a }}"
                                    class="form-control" placeholder="pict@gmail.com" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Update Node B</label>
                                <input type="text" name="update_node_b" value="{{ $customer->update_node_b }}"
                                    class="form-control" placeholder="picf@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="emailBackdrop" class="form-label">Port Node A</label>
                                <input type="text" name="port_node_a" value="{{ $customer->port_node_a }}"
                                    class="form-control" placeholder="Bandung" disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="dobBackdrop" class="form-label">Port Node B</label>
                                <input type="text" name="port_node_b" value="{{ $customer->port_node_b }}"
                                    class="form-control" placeholder="Jakarta" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Product</label>
                                <input type="text" name="product" value="{{ $customer->product }}" class="form-control"
                                    placeholder="Service" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Bandwidth</label>
                                <input type="text" name="bandwidth" value="{{ $customer->bandwidth }}"
                                    class="form-control" placeholder="Bandwidth" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
</div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id').val();

            swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'customer/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    } else {
                        swal("Data tidak akan tehapus!!");
                    }
                });
        });

    });
</script>
@endpush