@extends('layouts.partials.main')

@push('head')
    @vite('resources/js/app.js')
@endpush

@section('container')
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <h5 class="card-header">Data Customer</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Tiket Trouble</strong>
                                </td>
                                <td>{{ $data->t_ticket }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Customer</strong>
                                </td>
                                <td>{{ $data->customer->companyname }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Status</strong>
                                </td>
                                <td>{{ $data->status }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Node A</strong>
                                </td>
                                <td>{{ $data->customer->center_id }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Node B</strong>
                                </td>
                                <td>{{ $data->customer->stasiun_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        <a href="../ticket" class="btn btn-secondary btn-sm me-4">back</a>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-targ="#modalCenter2">
                            <i class='bx bxs-edit-alt'></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 mt-4 mt-lg-0">
        <div class="card">
            <div class="card-header bg-primary" style="">
                <ul class="nav nav-pills">
                    <li class="nav-item d-flex">
                        <i class='bx bxs-user text-white align-self-center'></i>
                        <a class="nav-link text-white text-uppercase">Log Ticket</a>
                    </li>
                </ul>
            </div>
            <div class="card-body" style="overflow-y: auto; max-height: 261px !important;height: 261px !important;">
                <div class="tab-content p-0">
                    <div class="tab-pane active">
                            @foreach ($logs as $log)
                                <div class="callout callout-info mt-2">
                                    <p style="margin: 0 !important;">{{ $log['keterangan'] }}</p>
                                    <small>No Ticket : {{ $log['t_ticket'] }}</small>
                                    <br>
                                    <small>Name : {{ $log['name'] }}<br>{{ $log['created_at'] }}</small>
                                    <hr>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-lg-3 mt-4 mt-lg-0" id="app">
    <messages></messages>
</div>

@foreach ($data as $ticket)
<!-- Modal -->
<form method="POST" action="{{ url('ticket/'.$data->id) }}">
    @csrf
    @method('put')
    <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Stasiun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="t_ticket" value="{{ $data->t_ticket }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                    <input type="hidden" name="customer" value="{{ $data->customer->companyname }}" id="nameWithTitle" class="form-control" placeholder="Edit Posting" />
                    <div class="row">
                        <div class="col mb-lg-2 mb-1">
                            <label for="nameWithTitle" class="form-label">Ticket Status</label>
                            <select class="form-select" id="status_a" aria-label="Default select example" name="status">
                                <option value="{{ $data->status }}">{{ $data->status }}</option>
                                <option value="open">Open</option>
                                <option value="hold">Hold</option>
                                <option value="close">Close</option>
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
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn-komentar').click(function(){
                $('#komentar-utama').toggle('slide');
            });
        });
        $(document).ready(function() {
            $('#btn-balas').click(function(){
                $('#btn-kedua').toggle('slide');
            });
        });
    </script>
@endpush
