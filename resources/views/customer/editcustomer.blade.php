@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Customer</h5>
            </div>
            <form method="POST" action="{{ url('customer/'.$data->id) }}">
                @csrf
                @method('put')
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <input type="text" name="companyname" class="form-control" placeholder="Company Name" value="{{ $data->companyname }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Company Address</label>
                            <input type="text" name="companyaddress" class="form-control" placeholder="Company Address" value="{{ $data->companyaddress }}">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Node A</label>
                                    <select class="form-select" id="node_a" aria-label="Default select example" name="center_id">
                                        <option value="{{ $data->center_id }}" selected>{{ $data->center->data_center }}</option>
                                        @foreach ($center as $data1)
                                        <option value="{{$data1->id}}">{{ $data1->data_center }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Node B</label>
                                    <select class="form-select" id="node_b" aria-label="Default select example" name="stasiun_id">
                                        <option value="{{ $data->stasiun_id }}" selected>{{ $data->stasiun->nama_stasiun }}</option>
                                        @foreach ($stasiun as $data2)
                                        <option value="{{$data2->id}}">{{ $data2->nama_stasiun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="081234567" value="{{ $data->phone }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">NPWP</label>
                                    <input type="text" name="npwp" class="form-control" placeholder="NPWP" value="{{ $data->npwp }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Deal Name</label>
                                    <input type="text" name="dealname" class="form-control" placeholder="Deal Name" value="{{ $data->dealname }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Position</label>
                                    <input type="text" name="position" class="form-control" placeholder="Position" value="{{ $data->position }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">No Handphone</label>
                                    <input type="text" name="nohandphone" class="form-control" placeholder="081234567" value="{{ $data->nohandphone }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Email Deal Name</label>
                                    <input type="text" name="emaildealname" class="form-control" placeholder="dealname@gmail.com" value="{{ $data->emaildealname }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Pic Technical Name</label>
                                    <input type="text" name="pictechnicalname" class="form-control" placeholder="Pict Name" value="{{ $data->pictechnicalname }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Pic Finace Name</label>
                                    <input type="text" name="picfinacename" class="form-control" placeholder="Picf Name" value="{{ $data->picfinacename }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Position PICT</label>
                                    <input type="text" name="position_pict" class="form-control" placeholder="Position Pict" value="{{ $data->position_pict }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Position PICF</label>
                                    <input type="text" name="position_picf" class="form-control" placeholder="Position Picf" value="{{ $data->position_picf }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Phone PICT</label>
                                    <input type="text" name="phone_pict" class="form-control" placeholder="081234567" value="{{ $data->phone_pict }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Phone PICF</label>
                                    <input type="text" name="phone_picf" class="form-control" placeholder="081234567" value="{{ $data->phone_picf }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Email PICT</label>
                                    <input type="text" name="email_pict" class="form-control" placeholder="pict@gmail.com" value="{{ $data->email_pict }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Email PICF</label>
                                    <input type="text" name="email_picf" class="form-control" placeholder="picf@gmail.com" value="{{ $data->email_picf }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Service</label>
                            <input type="text" name="service" class="form-control" placeholder="Service" value="{{ $data->service }}">
                        </div>
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Project</label>
                            <input type="text" name="project" class="form-control" placeholder="Project" value="{{ $data->project }}">
                        </div>
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Bandwidth</label>
                            <input type="text" name="bandwidth" class="form-control" placeholder="Bandwidth"value="{{ $data->bandwidth }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $("#node_a").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });
    $("#node_b").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

</script>
@endpush
