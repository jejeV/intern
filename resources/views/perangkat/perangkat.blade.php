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
            <h5 class="card-header">Perangkat</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="d-flex me-2">
                {{-- Search --}}
                <form action="{{ url('/perangkat') }}" method="GET" class="me-2 me-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Search..."
                            aria-label="Search..." aria-describedby="basic-addon-search31"
                            value="{{ request('search') }}" />
                    </div>
                </form>
                {{-- End Search --}}
                <!-- Button  create -->
                <button type="button" class="btn btn-primary text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#modalCenter">
                        Add
                </button>
            </div>
        </div>

        <form method="POST" action="{{ url('perangkat') }}">
            @csrf
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-lg-2 mb-1">
                                    <label for="nameWithTitle" class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" id="nameWithTitle" class="form-control"
                                        placeholder="Lokasi" autofocus />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-lg-2 mb-1">
                                    <label for="nameWithTitle" class="form-label">Perangkat</label>
                                    <input type="text" name="perangkat" id="nameWithTitle" class="form-control"
                                        placeholder="Perangkat" autofocus />
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
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Perangkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->lokasi }}</td>
                    <td>{{ $row->perangkat }}</td>
                    <td class="d-flex">
                          <div class="me-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalCenter2-{{ $row->id }}">
                                <i class='bx bxs-edit-alt'></i>
                            </button>
                        </div>
                        <form method="POST" action="{{ url('perangkat/'.$row->id) }}">
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
</div>

@foreach ($data as $perangkat)
<!-- Modal -->
<form method="POST" action="{{ url('perangkat/'.$perangkat->id) }}">
    @csrf
    @method('put')
    <div class="modal fade" id="modalCenter2-{{ $perangkat->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Perangkat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ $perangkat->lokasi }}" id="nameWithTitle"
                                class="form-control" placeholder="Enter Name" autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Perangkat</label>
                            <input type="text" name="perangkat" value="{{ $perangkat->perangkat }}"
                                id="nameWithTitle" class="form-control" placeholder="Nama Perangkat" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
{{-- End Edit --}}
@endsection
