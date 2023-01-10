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
                            <label class="form-label" for="basic-default-company">Company Address</label>
                            <input type="text" name="companyaddress" class="form-control" placeholder="Company Address" value="{{ $data->companyaddress }}">
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
                            <select class="form-select select-pilihan" id="service" aria-label="Default select example" name="service"  required>
                                @if ( $data->service  == 'Lease Line')
                                    <option value="{{ $data->service }}" selected>{{ $data->service }}</option>
                                    <option value="Clear Channel">Clear Channel</option>
                                    <option value="Dark Fiber">Dark Fiber</option>
                                @elseif( $data->service  == 'Clear Channel')
                                    <option value="{{ $data->service }}" selected>{{ $data->service }}</option>
                                    <option value="Lease Line">Lease Line</option>
                                    <option value="Dark Fiber">Dark Fiber</option>
                                @elseif( $data->service == 'Dark Fiber' )
                                    <option value="{{ $data->service }}" selected>{{ $data->service }}</option>
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
                        <div class="mb-3">
                            <label for="nameLarge" class="form-label">Project</label>
                            <input type="text" name="project" class="form-control" placeholder="Project" value="{{ $data->project }}">
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
