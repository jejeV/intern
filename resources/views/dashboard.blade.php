@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-2">Stasiun</h5>
                        <span class="h2 font-weight-bold">{{ $stasiun }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class="menu-icon tf-icons bx bx-train"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-2">customer</h5>
                        <span class="h2 font-weight-bold">{{ $customer }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-2">Ticket</h5>
                        <span class="h2 font-weight-bold">{{ $ticket }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class='bx bx-credit-card-front'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
