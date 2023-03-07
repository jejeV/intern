@extends('layouts.partials.main')

@push('head')
    <style>
        .card-header{
            padding-bottom: 0.80rem !important;
            margin-bottom: 0 !important;
        }

        .card-body{
            padding-top: 0.80rem !important;
        }
    </style>
@endpush

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="">Create Service</h5>
                @if (count($errors)>0)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <form method="POST" action="{{ url('service') }}" id="form">
                @csrf
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <select class="form-select" id="customer_id" aria-label="Default select example" name="customer_id" required>
                                @foreach ($customer->where('status','tidak aktif') as $val)
                                    @if (old('customer_id') == $val->id)
                                        <option value="{{ $val->id }}" selected>{{ $val->companyname }}</option>
                                    @else
                                        <option value=""></option>
                                        <option value="{{ $val->id }}">{{ $val->companyname }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="basic-default-phone">Status Node A</label>
                                    <select class="form-select select-pilihanA" id="status_a" aria-label="Default select example" name="status_node_a" required>
                                        <option value="">Select Status Node A</option>
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
                                <div class="col-6">
                                    <label class="form-label" for="basic-default-phone">Status Node B</label>
                                    <select class="form-select select-pilihanB" id="status_b" aria-label="Default select example" name="status_node_b">
                                        <option value="">Select Status Node A</option>
                                        <option value="pre survey by isp & ije">pre survey by isp & ije</option>
                                        <option value="penarikan kabel interkoneksi stasiun">penarikan kabel interkoneksi stasiun</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node b aktif">node b aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="divStatus">
                            <div class="row">
                                <div class="detail_a col-6" style="display: none">
                                    <div class="divCol" style="display: none">
                                        <label for="emailBackdrop" class="form-label">Detail Status Node A <br> <p class="mt-1 mb-0">{{ date('D, M Y H:i') }}</p></label>
                                        <input type="hidden" name="service_id" value="{{ $tt }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                                        <input type="text" name="detail_a" class="form-control" placeholder="Detail Status Node A" value="">
                                    </div>
                                </div>
                                <div class="detail_b col-6" style="display: none">
                                    <label for="emailBackdrop" class="form-label">Detail Status Node B <br> <p class="mt-1 mb-0">{{ date('D, M Y H:i') }}</p></label>
                                    <input type="hidden" name="service_id" value="{{ $tt }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                                    <input type="text" name="detail_b" class="form-control" placeholder="Detail Status Node B">
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
                                <div class="col-6">
                                    <label for="exampleFormControlSelect1" class="form-label">Swicth Node A</label>
                                    <select class="form-select" id="swicth_a" aria-label="Default select example" name="swicth_node_a">
                                        <option value=""></option>
                                        @foreach ($perangkat as $prkt)
                                        <option value="{{$prkt->perangkat}}">{{ $prkt->perangkat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
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
                                <div class="col-6">
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
                                <div class="col-6">
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

    $( "#status_a" ).change(function() {
        $('.divCol').removeAttr('style');
        $('.detail_a').removeAttr('style');
        // $('.detail_a').addClass("col-6");
        $('.divStatus').addClass("mb-3");
    });

    $("#status_b").change(function(){
        $('.divColb').removeAttr('style');
        $('.detail_b').removeAttr('style');
        $('.detail_a').removeAttr('style');
        $('.divStatus').addClass("mb-3");
    })

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

    $('#form').submit(function(){
        $(this).find(':input[type=submit]').prop('disabled', true);
    });
</script>
@endpush
