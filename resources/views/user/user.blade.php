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
            <h5 class="card-header">Pengguna</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="d-flex me-2">
                {{-- Search --}}
                <form action="{{ url('/user') }}" method="GET" class="me-2 me-lg-3">
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

        <form method="POST" action="{{ url('user') }}">
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
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input type="text" name="name" id="nameWithTitle" class="form-control" placeholder="Enter Name" autofocus />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-lg-2 mb-1">
                                    <label for="nameWithTitle" class="form-label">Username</label>
                                    <input type="text" name="username" id="nameWithTitle" class="form-control" placeholder="Enter Username" autofocus />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-lg-2 mb-1">
                                    <label for="nameWithTitle" class="form-label">Email</label>
                                    <input type="text" name="email" id="nameWithTitle" class="form-control" placeholder="Enter email" autofocus />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-lg-2 mb-1">
                                    <label for="nameWithTitle" class="form-label">Password</label>
                                    <div class="form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" required />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-lg-2 mb-1">
                                    <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                    <select class="form-select @error('level') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="role">
                                        <option selected>Select</option>
                                        <option value="admin">Admin</option>
                                        <option value="pegawai">Pegawai</option>
                                    </select>
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
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $index => $row)
                <tr>
                    <input type="hidden" class="delete_id" value="{{ $row->id }}">
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td class="d-flex">
                        <div class="me-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalCenter2-{{ $row->id }}">
                                <i class='bx bxs-edit-alt'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-2 me-lg-3 me-2">
            {{ $data->onEachSide(1)->links() }}
        </div>
    </div>
    {{-- Edit --}}
@foreach ($data as $user)
<!-- Modal -->
<form method="POST" action="{{ url('user/'.$user->id) }}">
    @csrf
    @method('put')
    <div class="modal fade" id="modalCenter2-{{ $user->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Stasiun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Password</label>
                            <input type="text" name="password" value="" id="nameWithTitle" class="form-control" placeholder="Password" autofocus required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="exampleFormControlSelect1" class="form-label">Role</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="role">
                                <option selected value="{{ $user->role }}">{{ $user->role }}</option>
                                <option value="admin">Admin</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
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
</div>
{{-- End Edit --}}
@endsection
