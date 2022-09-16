@extends('layouts.partials.main')

@section('title', 'Dashboard')

@section('container')
<div class="row">
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-info">
            <div class="card-body">
                <div class="row">
                    <div class="col">
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
        <div class="card card-stats mb-4 mb-xl-0 bg-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-10 col-12">
                        <a href="/customer">
                            <h5 class="card-title text-uppercase mb-2 text-white">customer</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $customer }}</span>
                    </div>
                    <div class="col-xl-2 col-12">
                        <div class="icon">
                            <i class='bx bx-user text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-10 col-12">
                        <a href="/ticket">
                            <h5 class="card-title text-uppercase mb-2 text-white">Ticket</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $ticket }}</span>
                    </div>
                    <div class="col-xl-2 col-12">
                        <div class="icon">
                            <i class='bx bx-credit-card-front text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-10 col-12">
                        <a href="/data-center">
                            <h5 class="card-title text-uppercase mb-2 text-white">Center</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $center }}</span>
                    </div>
                    <div class="col-xl-2 col-12">
                        <div class="icon">
                            <i class='bx bx-data text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-3 col-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-info">
            <div class="card-body">
                <div class="row">
                    <div class="col">
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
        <div class="card card-stats mb-4 mb-xl-0 bg-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-10 col-12">
                        <a href="/customer">
                            <h5 class="card-title text-uppercase mb-2 text-white">Perangkat</h5>
                        </a>
                        <span class="h2 font-weight-bold text-white">{{ $customer }}</span>
                    </div>
                    <div class="col-xl-2 col-12">
                        <div class="icon">
                            <i class='bx bxs-devices text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-12">
        <div class="card card-stats mb-4 mb-xl-0 bg-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-10 col-12">
                        <h5 class="card-title text-bold mb-2 text-white">Aktifitas Log</h5>
                    </div>
                    <div class="col-xl-2 col-12">
                        <div class="icon">
                            <i class='bx bx-user text-white'></i>
                        </div>
                    </div>
                    <hr class="mt-1 mb-1">
                    <div class="col-md">
                        <div class="card mt-3">
                            <div class="row g-0">
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title">Noc 1</h5>
                                        <p class="card-text">
                                           Update Status From On Progress To Done
                                        </p>
                                        <p class="card-text"><small class="text-muted">2022-09-13</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
