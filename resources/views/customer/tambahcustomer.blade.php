@extends('layouts.partials.main')

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
                            <label class="form-label" for="basic-default-company">Company Address</label>
                            <input type="text" name="companyaddress" class="form-control" placeholder="Company Address" required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Node A</label>
                                    <select class="form-select" id="node_a" aria-label="Default select example" name="center_id" required>
                                        <option value=""></option>
                                        @foreach ($center as $data1)
                                        <option value="{{$data1->data_center}}">{{ $data1->data_center }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="form-label">Node B</label>
                                    <select class="form-select" id="node_b" aria-label="Default select example" name="stasiun_id" required>
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
                                    <label class="form-label" for="basic-default-phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="081234567" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">NPWP</label>
                                    <input type="text" name="npwp" class="form-control" placeholder="NPWP" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Deal Name</label>
                                    <input type="text" name="dealname" class="form-control" placeholder="Deal Name" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Position</label>
                                    <input type="text" name="position" class="form-control" placeholder="Position" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">No Handphone</label>
                                    <input type="text" name="nohandphone" class="form-control" placeholder="081234567" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Email Deal Name</label>
                                    <input type="text" name="emaildealname" class="form-control" placeholder="dealname@gmail.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Pic Technical Name</label>
                                    <input type="text" name="pictechnicalname" class="form-control" placeholder="Pict Name" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Pic Finace Name</label>
                                    <input type="text" name="picfinacename" class="form-control" placeholder="Picf Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Position PICT</label>
                                    <input type="text" name="position_pict" class="form-control" placeholder="Position Pict" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Position PICF</label>
                                    <input type="text" name="position_picf" class="form-control" placeholder="Position Picf" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Phone PICT</label>
                                    <input type="text" name="phone_pict" class="form-control" placeholder="081234567" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Phone PICF</label>
                                    <input type="text" name="phone_picf" class="form-control" placeholder="081234567" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Email PICT</label>
                                    <input type="text" name="email_pict" class="form-control" placeholder="pict@gmail.com" required>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Email PICF</label>
                                    <input type="text" name="email_picf" class="form-control" placeholder="picf@gmail.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Service</label>
                            <select class="form-select select-pilihan" id="service" aria-label="Default select example" name="service"  required>
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
