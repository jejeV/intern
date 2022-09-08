@extends('layouts.partials.main')

@section('container')
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="/stasiun">
                            <h5 class="card-title text-uppercase mb-2">Stasiun</h5>
                        </a>
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
        <div class="card card-stats mb-4 mb-xl-0 bg-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="/customer">
                            <h5 class="card-title text-uppercase mb-2 text-white">customer</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $customer }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class='bx bx-user text-white'></i>
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
                        <a href="/ticket">
                            <h5 class="card-title text-uppercase mb-2">Ticket</h5>
                        </a>
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
