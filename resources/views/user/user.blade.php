@extends('layouts.partials.main')

@push('head')
    <style>
        .buttonModal{
            background: transparent;
            border: none;
            outline: none;
            transition: 0.4s ease-in-out;
            cursor: pointer;
            color: rgb(105, 108, 255);
        }

        .buttonModal:hover{
            text-shadow: 1px 1px 40px #000;
        }

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

@if (session()->has('change'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('change') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (count($errors)>0)
<div class="alert alert-danger alert-dismissible" role="alert">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="row align-items-center">
        <div class="col-6">
            <h5 class="card-header">User</h5>
        </div>

        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="me-2">
                <div class="d-flex flex-wrap me-2 justify-content-end">
                    {{-- Search --}}
                    <form action="{{ url('/user') }}" method="GET" class="me-2 me-lg-3" id="formSearch">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31">
                                <button type="submit" id="searchIcon"><i class="bx bx-search text-primary"></i></button>
                            </span>
                            <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" value="{{ request('search') }}" id="inputSearch" />
                        </div>
                    </form>
                    {{-- End Search --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary text-uppercase mt-lg-0 me-2 me-md-2 me-lg-0" id="btn" data-bs-toggle="modal"
                        data-bs-target="#modalCenter">
                        Add
                    </button>
                </div>
            </div>
        </div>
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
                @forelse ($data as $index => $row)
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
</div>

{{-- Modal Create --}}
<form method="POST" action="{{ url('user') }}" id="formCreate">
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
                            <input type="text" name="name" id="nameWithTitle" class="form-control" placeholder="Enter Name" autofocus required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Username</label>
                            <input type="text" name="username" id="nameWithTitle" class="form-control" placeholder="Enter Username" autofocus required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Email</label>
                            <input type="text" name="email" id="nameWithTitle" class="form-control" placeholder="Enter email" autofocus required/>
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
                            <select class="form-select @error('level') is-invalid @enderror" aria-label="Default select example" name="role" id="role">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- End Modal Create --}}

{{-- Modal Edit --}}
@foreach ($data as $user)
    {{-- Modal Select Edit --}}
    <div class="modal fade" id="modalCenter2-{{ $user->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-lg-6">
                                <button type="button" class="buttonModal" data-bs-toggle="modal" data-bs-target="#modalCenter4-{{ $user->id }}">
                                    Change Password
                                </button>
                            </div>
                            <div class="col mb-lg-6">
                                <button type="button" class="buttonModal" data-bs-toggle="modal" data-bs-target="#modalCenter3-{{ $user->id }}">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
        </div>
    </div>
    {{-- End Modal Select Edit --}}

    <!-- Modal Edit Profile User -->
    <form method="POST" action="{{ url('user/'.$user->id) }}" id="formEdit">
        @csrf
        @method('put')
        <div class="modal fade" id="modalCenter3-{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Profile</h5>
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
                                <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                <select class="form-select @error('level') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="role">
                                    @if ($user->role == "admin")
                                        <option selected value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="pegawai">Pegawai</option>
                                    @elseif($user->role == "pegawai")
                                        <option selected value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="admin">Admin</option>
                                    @endif
                                </select>
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
    {{-- Modal Edit Profile User --}}
    
    {{-- Modal Change Password --}}
    <form method="POST" action="/changepassword/{{ $user->id }}" id="">
        @csrf
        @method('put')
        <div class="modal fade" id="modalCenter4-{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                <label for="nameWithTitle" class="form-label">Confirm Password</label>
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="confirm_password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
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
    {{-- End Modal Change Password --}}
@endforeach
{{-- End Modal Edit --}}
@endsection
@push('scripts')
    <script>
    $("#role").select2({
        width: '100%',
        height: '10px',
        placeholder: "Select a Company",
        dropdownParent: $("#modalCenter"),
    });

    $('#formCreate').submit(function(){
        $(this).find(':input[type=submit]').prop('disabled', true);
    });

    $('#formEdit').submit(function(){
        $(this).find(':input[type=submit]').prop('disabled', true);
    });
</script>
@endpush
