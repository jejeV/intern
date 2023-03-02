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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Customer</h5>
            </div>
            <form method="POST" action="{{ url('customer') }}" id="form">
                @csrf
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <input type="text" name="companyname" class="form-control" placeholder="Company Name" required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-company">Sales Name</label>
                                    <input type="text" name="salesname" class="form-control" placeholder="Company Address" required>
                                </div>
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Net Active</label>
                                    <input type="text" name="net_active" class="form-control" placeholder="Net Active" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlSelect1" class="form-label">Node A</label>
                                    <select class="form-select" id="node_a" aria-label="Default select example" name="node_a" required>
                                        <option value=""></option>
                                        @foreach ($center as $data1)
                                        <option value="{{$data1->data_center}}">{{ $data1->data_center }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlSelect1" class="form-label">Node B</label>
                                    <select class="form-select" id="node_b" aria-label="Default select example" name="node_b" required>
                                        <option value=""></option>
                                        @foreach ($stasiun as $data2)
                                        <option value="{{$data2->nama_stasiun}}">{{ $data2->nama_stasiun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Ring</label>
                                    <input type="text" name="ring" class="form-control" placeholder="Ring" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Pair</label>
                                    <input type="text" name="pair" class="form-control" placeholder="Pair" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">KM</label>
                                    <input type="text" name="km" class="form-control" placeholder="KM" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">SO</label>
                                    <input type="text" name="so" class="form-control" placeholder="SO" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">CID</label>
                                    <input type="text" name="cid" class="form-control" placeholder="CID" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">SID</label>
                                    <input type="text" name="sid" class="form-control" placeholder="SID" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">HH Access</label>
                                    <input type="text" name="hh_access" class="form-control" placeholder="HH Access" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Backbone</label>
                                    <input type="text" name="backbone" class="form-control" placeholder="Backbone" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Update Node A</label>
                                    <input type="text" name="update_node_a" class="form-control" placeholder="Update Node A" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Update Node B</label>
                                    <input type="text" name="update_node_b" class="form-control" placeholder="Update Node B" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Port Node A</label>
                                    <input type="text" name="port_node_a" class="form-control" placeholder="Port Node A" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Port Node B</label>
                                    <input type="text" name="port_node_b" class="form-control" placeholder="Port Node B" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Product</label>
                            <select class="form-select select-pilihan" id="service" aria-label="Default select example" name="product" required>
                                <option value=""></option>
                                <option value="Lease Line">Lease Line</option>
                                <option value="Clear Channel">Clear Channel</option>
                                <option value="Dark Fiber">Dark Fiber</option>
                            </select>
                        </div>
                        <div class="mb-3 input" style="display: none">
                            <label for="nameLarge" class="form-label leaseline" style="display: none">Bandwidth</label>
                            <label for="nameLarge" class="form-label darkline" style="display: none">Jarak</label>
                            <select class="form-select input-leaseline" id="bandwidth" aria-label="Default select example" name="bandwidth">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
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

    $("#service").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select a Service",
        allowClear: true
    });

    $("#bandwidth").select2({
        width: '100%',
        height: '20px',
        placeholder: "Select to Bandwidth",
        allowClear: true
    });

    $( "#service" ).change(function() {
        if ($(".select-pilihan").val() == 'Dark Fiber'){
            $(".input").removeAttr('style');
            $(".darkline").removeAttr('style');
            $('.leaseline').attr('style', 'display:none;');
        }else{
            $(".input").removeAttr('style');
            $(".leaseline").removeAttr('style');
            $('.darkline').attr('style', 'display:none;');
        }
    });

    $('#form').submit(function(){
        $(this).find(':input[type=submit]').prop('disabled', true);
    });
</script>
@endpush
