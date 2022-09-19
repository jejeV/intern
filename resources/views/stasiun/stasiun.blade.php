@extends('layouts.partials.main')

@section('title', 'Stasiun')

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
            <h5 class="card-header">Stasiun</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="me-2">
                <div class="d-flex align-items-center">
                    {{-- Search --}}
                    <form action="{{ url('/stasiun') }}" method="GET" class="me-2 me-lg-3">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="search" name="search" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="basic-addon-search31"
                                value="{{ request('search') }}" />
                        </div>
                    </form>
                    {{-- End Search --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#modalCenter">
                        Add
                    </button>
                </div>

                <!-- Modal -->
                <form method="POST" action="{{ url('stasiun') }}">
                    @csrf
                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Tambah</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Daop</label>
                                            <input type="text" name="daop" id="nameWithTitle" class="form-control"
                                                placeholder="Daop" autofocus />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Nama Stasiun</label>
                                            <input type="text" name="nama_stasiun" id="nameWithTitle"
                                                class="form-control" placeholder="Stasiun" />
                                        </div>
                                        <div class="col-6 mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Kodkod</label>
                                            <input type="text" name="kodkod" id="nameWithTitle" class="form-control"
                                                placeholder="Kodkod" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Kmsta</label>
                                            <input type="text" name="kmtsta" id="nameWithTitle" class="form-control"
                                                placeholder="Kmsta" />
                                        </div>
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Line</label>
                                            <input type="text" name="line" id="nameWithTitle" class="form-control"
                                                placeholder="Line" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Remark</label>
                                            <input type="text" name="remark" id="nameWithTitle" class="form-control"
                                                placeholder="Remark" />
                                        </div>
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Rel Aktif No BB</label>
                                            <input type="text" name="rel_aktif_no_bb" id="nameWithTitle"
                                                class="form-control" placeholder="Rel Aktif No BB" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Ring</label>
                                            <input type="text" name="ring" id="nameWithTitle" class="form-control"
                                                placeholder="Ring" />
                                        </div>
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Segmen</label>
                                            <input type="text" name="segmen" id="nameWithTitle" class="form-control"
                                                placeholder="Segmen" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Daop</th> 
                    <th>Nama Stasiun</th>
                    <th>Kodkod</th>
                    <th>Kmtsta</th>
                    <th>Line</th>
                    {{-- <th>Rel aktif no bb</th>
                        <th>Ring</th>
                        <th>Segmen</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach   ($data as $index => $row)
                <tr>
                    <input type="hidden" class="delete_id" value="{{ $row->id }}">
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->daop }}</td>
                    <td>{{ $row->nama_stasiun }}</td>
                    <td>{{ $row->kodkod }}</td>
                    <td>{{ $row->kmtsta }}</td>
                    <td>{{ $row->line }}</td>
                    {{-- <td>{{ $row->rel_aktif_no_bb}}</td>
                    <td>{{ $row->ring}}</td>
                    <td>{{ $row->segmen}}</td> --}}
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
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalCenter2-{{ $row->id }}">
                                <i class='bx bxs-edit-alt'></i>
                            </button>
                        </div>
                        <form method="POST" action="{{ url('stasiun/'.$row->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm btndelete"><i class='bx bx-trash'></i></button>
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
</div>
{{-- Edit --}}
@foreach ($data as $stasiun)
<!-- Modal -->
<form method="POST" action="{{ url('stasiun/'.$stasiun->id) }}">
    @csrf
    @method('put')
    <div class="modal fade" id="modalCenter2-{{ $stasiun->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Stasiun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">daop</label>
                            <input type="text" name="daop" value="{{ $stasiun->daop }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">nama stasiun</label>
                            <input type="text" name="nama_stasiun" value="{{ $stasiun->nama_stasiun }}"
                                id="nameWithTitle" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col-6 mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">kodkod</label>
                            <input type="text" name="kodkod" value="{{ $stasiun->kodkod }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">kmtsta</label>
                            <input type="text" name="kmtsta" value="{{ $stasiun->kmtsta }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">line</label>
                            <input type="text" name="line" value="{{ $stasiun->line }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">remark</label>
                            <input type="text" name="remark" value="{{ $stasiun->remark }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">rel aktif no bb</label>
                            <input type="text" name="rel_aktif_no_bb" value="{{ $stasiun->rel_aktif_no_bb }}"
                                id="nameWithTitle" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">ring</label>
                            <input type="text" name="ring" id="nameWithTitle" value="{{ $stasiun->ring }}"
                                class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">segmen</label>
                            <input type="text" name="segmen" id="nameWithTitle" value="{{ $stasiun->segmen }}"
                                class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
{{-- End Edit --}}

{{-- Show Data --}}
@foreach ($data as $stasiun)
<!-- Modal -->
<form method="GET">
    <div class="modal fade" id="modalCenter3-{{ $stasiun->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Show Data Stasiun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">daop</label>
                            <input type="text" name="daop" value="{{ $stasiun->daop }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" autofocus disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">nama stasiun</label>
                            <input type="text" name="nama_stasiun" value="{{ $stasiun->nama_stasiun }}"
                                id="nameWithTitle" class="form-control" placeholder="Enter Name" disabled />
                        </div>
                        <div class="col-6 mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">kodkod</label>
                            <input type="text" name="kodkod" value="{{ $stasiun->kodkod }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">kmtsta</label>
                            <input type="text" name="kmtsta" value="{{ $stasiun->kmtsta }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" disabled />
                        </div>
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">line</label>
                            <input type="text" name="line" value="{{ $stasiun->line }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">remark</label>
                            <input type="text" name="remark" value="{{ $stasiun->remark }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" disabled />
                        </div>
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">rel aktif no bb</label>
                            <input type="text" name="rel_aktif_no_bb" value="{{ $stasiun->rel_aktif_no_bb }}"
                                id="nameWithTitle" class="form-control" placeholder="Enter Name" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">ring</label>
                            <input type="text" name="ring" id="nameWithTitle" value="{{ $stasiun->ring }}"
                                class="form-control" placeholder="Enter Name" disabled />
                        </div>
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">segmen</label>
                            <input type="text" name="segmen" id="nameWithTitle" value="{{ $stasiun->segmen }}"
                                class="form-control" placeholder="Enter Name" disabled />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
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
                            url: 'stasiun/' + deleteid,
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
