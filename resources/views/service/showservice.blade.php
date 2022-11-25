@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Show Service</h5>
            </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Company Name</label>
                            <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->customer->companyname }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Status Node A</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->status_node_a }}" readonly>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="basic-default-phone">Status Node B</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->status_node_b }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Detail Status Node A</label> <br>                                      
                                    @foreach ($detaila1 as $row)
                                    <div class="card p-2" style="background-color: #eceef1!important;">
                                        <p style="margin: 0!important;" class="text-bold">{{ $row->detail_a }}</p>
                                        <p class="small text-muted" style="margin: 0!important;">{{ $row->created_at->format('D, M Y H:i') }}</p>
                                    </div>
                                    @endforeach
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCenter2" style="padding: 0!important; border: 0!important; margin: 10px 0 0 0!important">
                                        <p class="text-primary">Show More ...</p>
                                    </button>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Detail Status Node B</label> <br>                                      
                                    @foreach ($detailb1 as $row)
                                    <div class="card p-2" style="background-color: #eceef1!important;">
                                        <p style="margin: 0!important;" class="text-bold">{{ $row->detail_b}}</p>
                                        <p class="small text-muted" style="margin: 0!important;">{{ $row->created_at->format('D, M Y H:i') }}</p>
                                    </div>
                                    @endforeach
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCenter4" style="padding: 0!important; border: 0!important; margin: 10px 0 0 0!important">
                                        <p class="text-primary">Show More ...</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Location Node A</label>
                                    <input type="text" name="location_node_a" class="form-control" placeholder="Location Node A" value="{{ $data->customer->center_id }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Location Node B</label>
                                    <input type="text" name="location_node_b" class="form-control" placeholder="Location Node B" value="{{ $data->customer->stasiun_id }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Rack Node A</label>
                                    <input type="text" name="rack_node_a" class="form-control" placeholder="Rack Node A" value="{{ $data->rack_node_a }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Rack Node B</label>
                                    <input type="text" name="rack_node_b" class="form-control" placeholder="Rack Node B" value="{{ $data->rack_node_b }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Swicth Node A</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->swicth_node_a }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Swicth Node B</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->switch_node_b }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Request Number Node A</label>
                                    <input type="text" name="request_number_node_a" class="form-control" placeholder="Request Number Node A" value="{{ $data->request_number_node_a }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Request Number Node B</label>
                                    <input type="text" name="request_number_node_b" class="form-control" placeholder="Request Number Node B" value="{{ $data->request_number_node_b }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Label Node A</label>
                                    <input type="text" name="label_node_a" class="form-control" placeholder="Label Node A" value="{{ $data->label_node_a }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Label Node B</label>
                                    <input type="text" name="label_node_b" class="form-control" placeholder="Label Node B" value="{{ $data->label_node_b }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="emailBackdrop" class="form-label">Cable Lenght Node A</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->cable_lenght_node_a }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="dobBackdrop" class="form-label">Cable Lenght Node B</label>
                                    <input type="text" name="detail_status_node_a" class="form-control" placeholder="Detail Status Node A" value="{{ $data->cable_lenght_node_b }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <a href="../service" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

    {{-- modal Detaal A --}}
    <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Detail Status Node A</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 200px !important;height: 200px !important;">
                    @if ($detaila1->count() == 0)
                            <p class="text-center fs-3 text-black mt-5">Not Found</p>
                    @else                
                    @foreach ($detaila as $row)
                        <div class="row">
                            <div class="col mb-lg-2 mb-1">
                                <p style="margin: 0!important;" class="text-bold">{{ $row->detail_a }}</p>
                                <p class="small text-muted" style="margin: 0!important;">{{ $row->created_at->format('D, M Y H:i') }}</p>
                                <hr style="margin: 5px 0 !important">
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Detail A --}}

    {{-- Modal Detal B --}}
    <div class="modal fade" id="modalCenter4" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Detail Status Node B</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 200px !important;height: 200px !important;">
                    @if ($detailb->count() == 0)
                            <p class="text-center fs-3 text-black mt-5">Not Found</p>
                    @else                
                    @foreach ($detailb as $row)
                        <div class="row">
                            <div class="col mb-lg-2 mb-1">
                                <p style="margin: 0!important;" class="text-bold">{{ $row->detail_b }}</p>
                                <p class="small text-muted" style="margin: 0!important;">{{ $row->created_at->format('D, M Y H:i') }}</p>
                                <hr style="margin: 5px 0 !important">
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Detal B --}}
@endsection
