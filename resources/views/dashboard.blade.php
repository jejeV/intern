@extends('layouts.partials.main')

@section('title', 'Dashboard')

@section('container')
@if (session()->has('login'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('login') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-blue">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md">
                        <a href="/stasiun">
                            <h5 class="card-title text-uppercase mb-2 text-white">Stasiun</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $stasiun }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class="menu-icon tf-icons bx bx-train text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-blue">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md">
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
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-blue">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md">
                        <a href="/ticket">
                            <h5 class="card-title text-uppercase mb-2 text-white">Ticket</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $ticket }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class='bx bx-credit-card-front text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-blue">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md">
                        <a href="/data-center">
                            <h5 class="card-title text-uppercase mb-2 text-white">Center</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $center }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class='bx bx-data text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-lg-4">
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-blue">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md">
                        <a href="/service">
                            <h5 class="card-title text-uppercase mb-2 text-white">Service</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $service }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class="menu-icon tf-icons bx bx-station text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-blue">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md">
                        <a href="/perangkat">
                            <h5 class="card-title text-uppercase mb-2 text-white">Perangkat</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $perangkat }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon">
                            <i class='bx bxs-devices text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
