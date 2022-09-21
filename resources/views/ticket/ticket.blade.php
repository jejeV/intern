@extends('layouts.partials.main')

@section('title', 'Ticket')

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
{{-- Ticket --}}
<div class="card">
    <div class="row">
        <div class="col-6">
            <h5 class="card-header">Stasiun</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="me-2">
                <div class="d-flex align-items-center">
                    {{-- Search --}}
                    <form action="{{ url('/ticket') }}" method="GET" class="me-2 me-lg-3">
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
                <form method="POST" action="{{ url('ticket') }}">
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
                                            <label for="nameWithTitle" class="form-label">Ticket</label>
                                            <input type="text" name="t_ticket" id="nameWithTitle" class="form-control"
                                             placeholder="Enter Name" autofocus readonly value="{{ 'TT-'.$tt }}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Posting</label>
                                            <select class="form-select" id="status" aria-label="Default select example" name="status">
                                                <option value=""></option>
                                                <option value="open">open</option>
                                                <option value="wait for respone">wait for respone</option>
                                                <option value="hold">hold</option>
                                                <option value="close">close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Customer</label>
                                            <input type="text" name="customer" id="nameWithTitle" class="form-control"
                                                placeholder="Enter Ticket Status" autofocus />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Node A</label>
                                            <input type="text" name="node_a" id="nameWithTitle" class="form-control"
                                                placeholder="Enter Ticket Status" autofocus />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-lg-2 mb-1">
                                            <label for="nameWithTitle" class="form-label">Node B</label>
                                            <input type="text" name="node_b" id="nameWithTitle" class="form-control"
                                                placeholder="Enter Ticket Status" autofocus />
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
                    <th>Ticket Trouble</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->t_ticket }}</td>
                    <td>{{ $row->customer }}</td>
                    <td>{{ $row->status }}</td>
                    <td class="d-flex">
                        <div class="me-2">
                            <!-- Button trigger modal -->
                            <a href="{{ ('ticket/'.$row->id) }}" class="btn btn-primary btn-sm"><i class='bx bxs-show'></i></a>
                        </div>
                        <div class="me-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalCenter2-{{ $row->id }}">
                                <i class='bx bxs-edit-alt'></i>
                            </button>
                        </div>
                        <form method="POST" action="{{ url('ticket/'.$row->id) }}">
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
{{-- End Ticket --}}

{{-- Edit --}}
@foreach ($data as $ticket)
<!-- Modal -->
<form method="POST" action="{{ url('ticket/'.$ticket->id) }}">
    @csrf
    @method('put')
    <div class="modal fade" id="modalCenter2-{{ $ticket->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Stasiun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Ticket Trouble</label>
                            <input type="text" name="t_ticket" value="{{ $ticket->t_ticket }}" id="nameWithTitle"
                                class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Posting</label>
                            <input type="text" name="posting" value="{{ $ticket->posting }}"
                                id="nameWithTitle" class="form-control" placeholder="Edit Posting" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Ticket Status</label>
                            <input type="text" name="tt_stat" value="{{ $ticket->tt_stat }}"
                                id="nameWithTitle" class="form-control" placeholder="Edit Ticket Status" />
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
@endsection

@push('scripts')
<script type="text/javascript">
    $("#status").select2({
    width: '100%',
    height: '10px',
    placeholder: "Select a Status",
    dropdownParent: $("#modalCenter"),
});

</script>
@endpush
