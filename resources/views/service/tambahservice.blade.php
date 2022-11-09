@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="">Create Service</h5>
            </div>
            <form method="POST" action="{{ url('service') }}">
                @csrf
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <select class="form-select" id="customer_id" aria-label="Default select example" name="customer_id">
                                <option value=""></option>
                                @foreach ($customer->where('status',0) as $data2)
                                <option value="{{$data2->id}}">{{ $data2->companyname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Status Node A</label>
                                    <select class="form-select" id="status_a" aria-label="Default select example" name="status_node_a">
                                        <option value=""></option>
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
                                        <option value=""></option>
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
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Detail Status Node B</label>
                                    <input type="text" name="detail_status_node_b" class="form-control" placeholder="Detail Status Node B">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Location Node A</label>
                                    <input type="text" name="location_node_a" class="form-control" placeholder="Location Node A" value="{{ $customer[1]->companyname }}" readonly> 
                                    {{-- belom fix --}}
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Location Node B</label>
                                    <input type="text" name="location_node_b" class="form-control" placeholder="Location Node B">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Rack Node A</label>
                                    <input type="text" name="rack_node_a" class="form-control" placeholder="Rack Node A">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Rack Node B</label>
                                    <input type="text" name="rack_node_b" class="form-control" placeholder="Rack Node B">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Swicth Node A</label>
                                    <select class="form-select" id="swicth_a" aria-label="Default select example" name="swicth_node_a">
                                        <option value=""></option>
                                        @foreach ($perangkat as $prkt)
                                        <option value="{{$prkt->perangkat}}">{{ $prkt->perangkat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="col">
                                    <label for="dobBackdrop" class="form-label">Swicth Node B</label>
                                    <select class="form-select" id="swicth_b" aria-label="Default select example" name="switch_node_b">
                                        <option value=""></option>
                                        @foreach ($perangkat as $prkt)
                                        <option value="{{$prkt->perangkat}}">{{ $prkt->perangkat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Request Number Node A</label>
                                    <input type="text" name="request_number_node_a" class="form-control" placeholder="Request Number Node A">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Request Number Node B</label>
                                    <input type="text" name="request_number_node_b" class="form-control" placeholder="Request Number Node B">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Label Node A</label>
                                    <input type="text" name="label_node_a" class="form-control" placeholder="Label Node A">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Label Node B</label>
                                    <input type="text" name="label_node_b" class="form-control" placeholder="Label Node B">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Cable Lenght Node A</label>
                                    <select class="form-select" id="cable_a" aria-label="Default select example" name="cable_lenght_node_a">
                                        <option value=""></option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Cable Lenght Node B</label>
                                    <select class="form-select" id="cable_b" aria-label="Default select example" name="cable_lenght_node_b">
                                        <option value=""></option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
        placeholder: "Select a Node A",
        allowClear: true
    });
    $("#node_b").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Node B",
        allowClear: true
    });

    $("#customer_id").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Name Company",
        allowClear: true
    });

    $("#status_a").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Status Node A",
        allowClear: true
    });
    
    $("#status_b").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Status Node B",
        allowClear: true
    });

    $("#cable_a").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Cable Lenght Node A",
        allowClear: true
    });

    $("#cable_b").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Cable Lenght Node A",
        allowClear: true
    });

    $("#swicth_a").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Cable Lenght Node A",
        allowClear: true
    });

    $("#swicth_b").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Cable Lenght Node A",
        allowClear: true
    });

</script>
@endpush
