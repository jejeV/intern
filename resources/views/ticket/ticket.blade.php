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
{{-- Ticket --}}
<div class="card">
    <div class="row align-items-center">
        <div class="col-6">
            <h5 class="card-header">Ticket Trouble</h5>
        </div>
        <div class="col-6 p-3 d-flex justify-content-end">
            <div class="me-2">
                <div class="d-flex flex-wrap me-2 justify-content-end">
                    {{-- Search --}}
                    <form action="{{ url('/ticket') }}" method="GET" class="me-2 me-lg-3" id="formSearch">
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
                    <th>Ticket Trouble</th>
                    <th>Company Name</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($data as $index => $row)
                    <tr>
                        <input type="hidden" class="delete_id" value="{{ $row->id }}">
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->t_ticket }}</td>
                        <td>{{ $row->customer->companyname }}</td>
                        <td>{{ $row->status }}</td>
                        <td class="d-flex">
                            @if ($row->status == 'close')                            
                            @else
                            <div class="me-2">
                                <a href="{{ ('ticket/'.$row->id) }}" class="btn btn-primary btn-sm"><i class='bx bxs-show'></i></a>
                            </div>
                            @endif
                            <form method="POST" action="{{ url('ticket/'.$row->id) }}">
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
</div>
{{-- End Ticket --}}

<!-- Modal Create -->
<form method="POST" action="{{ url('ticket') }}" id="form">
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
                            <input type="hidden" name="t_ticket" id="nameWithTitle" class="form-control"
                             placeholder="Enter Name" autofocus readonly value="{{ 'TT-'.$tt }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <input type="hidden" class="form-control" value="open" name="status">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Customer</label>
                            <select class="form-select" id="status" aria-label="Default select example" name="customer_id">
                                <option value=""></option>
                                @foreach ($customer->where('status','aktif') as $data2)
                                <option value="{{$data2->id}}">{{ $data2->companyname }}</option>
                                @endforeach
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
{{-- END Modal Create --}}

@endsection

@push('scripts')
<script type="text/javascript">
$("#status").select2({
    width: '100%',
    height: '10px',
    placeholder: "Select a Company",
    dropdownParent: $("#modalCenter"),
});

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
                        url: 'ticket/' + deleteid,
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

$('#form').submit(function(){
    $(this).find(':input[type=submit]').prop('disabled', true);
});
</script>
@endpush
