@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Customer</h5>
            </div>
            <form method="POST" action="{{ url('customer/'.$data->id) }}" id="form">
                @csrf
                @method('put')
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <input type="text" name="companyname" class="form-control" placeholder="Company Name" value="{{ $data->companyname }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Sales Name</label>
                            <input type="text" name="salesname" class="form-control" placeholder="Company Address" value="{{ $data->salesname }}">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Ring</label>
                                    <input type="text" name="ring" class="form-control" placeholder="081234567" value="{{ $data->ring }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Pair</label>
                                    <input type="text" name="pair" class="form-control" placeholder="NPWP" value="{{ $data->pair }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">KM</label>
                                    <input type="text" name="km" class="form-control" placeholder="Deal Name" value="{{ $data->km }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">SO</label>
                                    <input type="text" name="so" class="form-control" placeholder="Position" value="{{ $data->so }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">CID</label>
                                    <input type="text" name="cid" class="form-control" placeholder="081234567" value="{{ $data->cid }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">SID</label>
                                    <input type="text" name="sid" class="form-control" placeholder="dealname@gmail.com" value="{{ $data->sid }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Net Active</label>
                                    <input type="text" name="net_active" class="form-control" placeholder="Pict Name" value="{{ $data->net_active }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Active Date</label>
                                    <input type="date" name="active_date" class="form-control" placeholder="Picf Name" value="{{ $data->active_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">HH Access</label>
                                    <input type="text" name="hh_access" class="form-control" placeholder="Position Pict" value="{{ $data->hh_access }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Backbone</label>
                                    <input type="text" name="backbone" class="form-control" placeholder="Position Picf" value="{{ $data->backbone }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Update Node A</label>
                                    <input type="text" name="update_node_a" class="form-control" placeholder="081234567" value="{{ $data->update_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Update Node B</label>
                                    <input type="text" name="update_node_b" class="form-control" placeholder="081234567" value="{{ $data->update_node_b }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Port Node A</label>
                                    <input type="text" name="port_node_a" class="form-control" placeholder="pict@gmail.com" value="{{ $data->port_node_a }}">
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Port Node B</label>
                                    <input type="text" name="port_node_b" class="form-control" placeholder="picf@gmail.com" value="{{ $data->port_node_b}}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Product</label>
                            <select class="form-select select-pilihan" id="service" aria-label="Default select example" name="product"  required>
                                @if ( $data->product  == 'Lease Line')
                                    <option value="{{ $data->product }}" selected>{{ $data->product }}</option>
                                    <option value="Clear Channel">Clear Channel</option>
                                    <option value="Dark Fiber">Dark Fiber</option>
                                @elseif( $data->product  == 'Clear Channel')
                                    <option value="{{ $data->product }}" selected>{{ $data->product }}</option>
                                    <option value="Lease Line">Lease Line</option>
                                    <option value="Dark Fiber">Dark Fiber</option>
                                @elseif( $data->product == 'Dark Fiber' )
                                    <option value="{{ $data->product }}" selected>{{ $data->product }}</option>
                                    <option value="Lease Line">Lease Line</option>
                                    <option value="Clear Channel">Clear Channel</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3 input" style="display: none">
                            <label for="nameLarge" class="form-label leaseline" style="display: none">Bandwidth</label>
                            <label for="nameLarge" class="form-label darkline" style="display: none">Jarak</label>
                            <select class="form-select input-leaseline" id="bandwidth" aria-label="Default select example" name="bandwidth">
                                <option value="{{ $data->bandwidth }}" selected>{{ $data->bandwidth }}</option>
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
        allowClear: true
    });
    $("#node_b").select2({
        width: '100%',
        height: '20px',
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
