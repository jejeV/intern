@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Service</h5>
            </div>
                <div class="card-body">
                    <form name="form1" method="POST" action="{{ url('service/'.$data->id) }}" id="form1">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <select class="form-select" id="customer_id" aria-label="Default select example" name="customer_id">
                                <option value="{{ $data->customer_id }}">{{ $data->customer->companyname }}</option>
                                {{-- @foreach ($customer as $data2)
                                <option value="{{$data2->id}}">{{ $data2->companyname }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Status Node A</label>
                                    <select class="form-select select-pilihanA" id="status_a" aria-label="Default select example" name="status_node_a">
                                        <option value="{{ $data->status_node_a }}">{{ $data->status_node_a }}</option>
                                        @if ($data->status_node_a == 'submit interkoneksi diportal apjii')
                                        <option value="aproved nni by partner (isp)">aproved nni by partner (isp)</option>
                                        <option value="pre survey by apjii, update cable length">pre survey by apjii, update cable length</option>
                                        <option value="drop kabel patchcord">drop kabel patchcord</option>
                                        <option value="penarikan kabel patchcord by apjii">penarikan kabel patchcord by apjii</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'aproved nni by partner (isp)')
                                        <option value="pre survey by apjii, update cable length">pre survey by apjii, update cable length</option>
                                        <option value="drop kabel patchcord">drop kabel patchcord</option>
                                        <option value="penarikan kabel patchcord by apjii">penarikan kabel patchcord by apjii</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'pre survey by apjii, update cable length')
                                        <option value="drop kabel patchcord">drop kabel patchcord</option>
                                        <option value="penarikan kabel patchcord by apjii">penarikan kabel patchcord by apjii</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'drop kabel patchcord')
                                        <option value="penarikan kabel patchcord by apjii">penarikan kabel patchcord by apjii</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'penarikan kabel patchcord by apjii')
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'konfirmasi jadwal aktivasi by customer')
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'penjadwalan aktivasi by ije')
                                        <option value="node a aktif">node a aktif</option>
                                        @elseif ($data->status_node_a == 'node a aktif')
                                        @endif
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Status Node B</label>
                                    <select class="form-select select-pilihanB" id="status_b" aria-label="Default select example" name="status_node_b">
                                        <option value="{{ $data->status_node_b }}">{{ $data->status_node_b }}</option>
                                        @if ($data->status_node_b == 'pre survey by isp & ije')
                                        <option value="penarikan kabel interkoneksi stasiun">penarikan kabel interkoneksi stasiun</option>
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node b aktif">node b aktif</option>
                                        @elseif ($data->status_node_b == 'penarikan kabel interkoneksi stasiun')
                                        <option value="konfirmasi jadwal aktivasi by customer">konfirmasi jadwal aktivasi by customer</option>
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node b aktif">node b aktif</option>
                                        @elseif ($data->status_node_b == 'konfirmasi jadwal aktivasi by customer')
                                        <option value="penjadwalan aktivasi by ije">penjadwalan aktivasi by ije</option>
                                        <option value="node b aktif">node b aktif</option>
                                        @elseif ($data->status_node_b == 'penjadwalan aktivasi by ije')
                                        <option value="node b aktif">node b aktif</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="divStatus">
                            <div class="row">
                                <div class="detail_a col-6" style="display: none">
                                    <div class="divCol" style="display: none">
                                        {{-- strtotime(now()->parse($data->date)->addDays(5)) --}}
                                        <label for="emailBackdrop" class="form-label">Detail Status Node A <br> <p class="mt-1 mb-0">{{ date('D, d-m-Y H:i') }}</p></label>
                                        <input type="hidden" name="service_id" value="{{ $data->id }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                                        <input type="text" name="detail_a" class="form-control" placeholder="Detail Status Node A" value="">
                                    </div>
                                </div>
                                <div class="detail_b col-6" style="display: none">
                                    <input type="hidden" name="service_id" value="{{ $data->id }}" id="nameWithTitle" class="form-control" placeholder="Edit Ticket Trouble" autofocus />
                                    <label for="emailBackdrop" class="form-label">Detail Status Node B <br> <p class="mt-1 mb-0">{{ date('D, d-m-Y H:i') }}</p></label>
                                    <input type="text" name="detail_b" class="form-control" placeholder="Detail Status Node B">
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
                                    <select class="form-select" id="swicth_a" aria-label="Default select example" name="swicth_node_a">
                                        <option value="{{ $data->swicth_node_a }}">{{ $data->swicth_node_a }}<option>
                                        @foreach ($perangkat as $prkt)
                                        <option value="{{$prkt->perangkat}}">{{ $prkt->perangkat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Swicth Node B</label>
                                    <select class="form-select" id="swicth_b" aria-label="Default select example" name="switch_node_b">
                                        <option value="{{ $data->switch_node_b }}">{{ $data->switch_node_b }}<option>
                                        @foreach ($perangkat as $prkt)
                                        <option value="{{$prkt->perangkat}}">{{ $prkt->perangkat }}</option>
                                        @endforeach
                                    </select>
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
                                    <select class="form-select" id="cable_a" aria-label="Default select example" name="cable_lenght_node_a">
                                        <option value="{{ $data->cable_lenght_node_a }}">{{ $data->cable_lenght_node_a }}</option>
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
                                        <option value="{{ $data->cable_lenght_node_b }}">{{ $data->cable_lenght_node_b }}</option>
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
                        {{-- <input type="button" onClick="submitForms()" value="Save"> --}}
                        <div class="d-flex justify-content-end mt-2">
                            {{-- <button type="submit" class="btn btn-primary" id="btn1">Submit</button> --}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>  
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('head')
<script language="javascript">
    // submitForms = function{
    // // document.form1.submit();
    //     // document.getElementById("form1").submit();
    //     document.getElementById("form1").submit();
    //     document.getElementById("form2").submit();

    // }

    function submit_form(){
        document.form1.submit();
        document.form2.submit();
        // document.form3.submit();
    }
    </script>
@endpush --}}

@push('scripts')
<script type="text/javascript">

    // $('#btn1').click(function(){
    //     $('#form1').attr('action', '{{ url('service/'.$data->id) }}');
    //     $('#form1').submit();
    //     $('#form2').attr('action', '{{ url('detaila') }}');
    //     $('#form2').submit();
    // });

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
        allowClear: true
    });
    
    $("#status_b").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

    $("#cable_a").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

    $("#cable_b").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

    $("#swicth_a").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });

    $("#swicth_b").select2({
        width: '100%',
        height: '20px',
        allowClear: true
    });
    
</script>
@endpush