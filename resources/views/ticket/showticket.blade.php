@extends('layouts.partials.main')

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
                                <td>{{ $data->customer }}</td>
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
                                <td>{{ $data->node_a }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Node B</strong>
                                </td>
                                <td>{{ $data->node_b }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-lg-3">
    <div class="col-lg-7">
        <div class="card">
            <div class="d-flex">
                <h5 class="card-header flex-fill" style="margin-bottom: -1.2rem !important; padding: -1.5rem !important;">Komentar</h5>
            </div>
            <hr>
            <form method="POST">
                @csrf
                <div class="card-body " style="margin-top: -1.2rem !important; margin-bottom: -1.2rem !important">
                    <input type="hidden" name="ticket_id" value="{{ $data->id }}">
                    <input type="hidden" name="parent" value="0">
                    <textarea style="" class="form-control mb-2" rows="3" name="komentar"></textarea>
                    <button type="submit" class="btn btn-primary mb-3">Kirim</button>
                </div>
            </form>
            <button class="btn btn-outline-primary" id="btn-komentar"><i class='bx bxs-chat me-2'></i>Komentar</button>
            <div class="card" style="display: ;" id="komentar-utama">
                <div class="card-body bg-default" style="overflow-y: auto; max-height: 500px !important;height: 500px !important; background-color: #f0f2f5;">
                    @foreach ($data->komentar()->where('parent',0)->orderBy('created_at', 'desc')->get() as $komentar)    
                        <div class="card mb-2 shadow">
                            <div class="card-body">
                                <p>{{ $komentar->komentar }}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <i class='bx bxs-user'></i>
                                        <p class="small mb-0 ms-2 text-primary">{{ $komentar->user->name }}</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">{{ $komentar->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button class="btn btn-primary btn-xs" id="btn-balas">Balas</button>
                                </div>
                                <form action="" method="POST" class="mt-2" style="display: none;" id="btn-kedua">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $data->id }}">
                                    <input type="hidden" name="parent" value="{{ $komentar->id }}">
                                    <input type="text" name="komentar" class="form-control">
                                    <button type="submit" class="btn btn-primary btn-xs mt-1">Kirim</button>
                                </form>
                                <hr>
                                @foreach ($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <p class="me-2 text-primary">{{ $child->user->name }}</p>
                                            <p>{{ $child->komentar }}</p>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <p class="small text-muted">{{ $child->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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
