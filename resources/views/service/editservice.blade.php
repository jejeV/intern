@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Service</h5>
            </div>
            <form method="POST" action="{{ url('service/'.$data->id) }}">
                @csrf
                @method('put')
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <select class="form-select" id="customer_id" aria-label="Default select example" name="customer_id">
                                <option value="{{ $data->customer_id }}">{{ $data->customer->companyname }}</option>
                                @foreach ($customer as $data2)
                                <option value="{{$data2->id}}">{{ $data2->companyname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Node A</label>
                                    <select class="form-select" id="node_a" aria-label="Default select example" name="center_id">
                                        <option value="{{ $data->center_id }}">{{ $data->center->data_center }}</option>
                                        @foreach ($center as $data1)
                                        <option value="{{$data1->id}}">{{ $data1->data_center }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Node B</label>
                                    <select class="form-select" id="node_b" aria-label="Default select example" name="stasiun_id">
                                        <option value="{{ $data->stasiun_id }}">{{ $data->stasiun->nama_stasiun }}<option>
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
                                    <label class="form-label" for="basic-default-phone">Status Node A</label>
                                    <select class="form-select" id="status_a" aria-label="Default select example" name="status_node_a">
                                        <option value="{{ $data->status_node_a }}">{{ $data->status_node_a }}</option>
                                        <option value="submit interkoneksi diportal apjii">submit interkoneksi diportal apjii</option>
                                        <option value="aproved nni by partner (isp)">aproved nni by partner (isp)</option>
                                        <option value="pre survey by apjii, update cable length">pre survey by apjii, update cable length</option>
                                        <option value="drop kabel patchcord">drop kabel patchcord</option>
                                        <option value="penarikan kabel patchcord by apjii">penarikan kabel patchcord by apjii</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Status Node B</label>
                                    <select class="form-select" id="status_b" aria-label="Default select example" name="status_node_b">
                                        <option value="{{ $data->status_node_b }}">{{ $data->status_node_b }}</option>
                                        <option value="pre survey by isp & ije">pre survey by isp & ije</option>
                                        <option value="penarikan kabel interkoneksi stasiun">penarikan kabel interkoneksi stasiun</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node b aktif">node b aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Detail Status Node A</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->detail_status_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Detail Status Node B</label>
                                    <input type="text" name="detail_status_node_b" class="form-control" placeholder="Detail Status Node B" value="{{ $data->detail_status_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Location Node A</label>
                                    <input type="text" name="location_node_a" class="form-control" placeholder="Location Node A" value="{{ $data->location_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Location Node B</label>
                                    <input type="text" name="location_node_b" class="form-control" placeholder="Location Node B" value="{{ $data->location_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Rack Node A</label>
                                    <input type="text" name="rack_node_a" class="form-control" placeholder="Rack Node A" value="{{ $data->rack_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Rack Node B</label>
                                    <input type="text" name="rack_node_b" class="form-control" placeholder="Rack Node B" value="{{ $data->rack_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Swicth Node A</label>
                                    <input type="text" name="swicth_node_a" class="form-control" placeholder="Swicth Node A" value="{{ $data->swicth_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Swicth Node B</label>
                                    <input type="text" name="switch_node_b" class="form-control" placeholder="Swicth Node B" value="{{ $data->switch_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Request Number Node A</label>
                                    <input type="text" name="request_number_node_a" class="form-control" placeholder="Request Number Node A" value="{{ $data->request_number_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Request Number Node B</label>
                                    <input type="text" name="request_number_node_b" class="form-control" placeholder="Request Number Node B" value="{{ $data->request_number_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Label Node A</label>
                                    <input type="text" name="label_node_a" class="form-control" placeholder="Label Node A" value="{{ $data->label_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Label Node B</label>
                                    <input type="text" name="label_node_b" class="form-control" placeholder="Label Node B" value="{{ $data->label_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Cable Lenght Node A</label>
                                    <input type="text" name="cable_lenght_node_a" class="form-control" placeholder="Cable Lenght Node A" value="{{ $data->cable_lenght_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Cable Lenght Node B</label>
                                    <input type="text" name="cable_lenght_node_b" class="form-control" placeholder="Cable Lenght Node B" value="{{ $data->cable_lenght_node_b }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-flex justify-content-end">Submit</button>
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

    $("#customer_id").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

    $("#status_a").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });
    
    $("#status_b").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

</script>
@endpush