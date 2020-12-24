@extends('layouts.dashboard')

@section('title')
Store Dashboard Transactions
@endsection

@section('content')
<!-- Page Contents -->
<div id="page-content-wrapper">
        {{-- <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                                &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Dekstop Menu -->
                                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                        <li class="navbar-item dropdown">
                                                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                                        <img src="/images/user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                                                        Hi, Angga
                                                </a>
                                                <div class="dropdown-menu">
                                                        <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
                                                        <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="/" class="dropdown-item">Logout</a>
                                                </div>
                                        </li>
                                        <li class="nav-item">
                                                <a href="#" class="nav-link d-inline-block mt-2">
                                                        <img src="/images/icon-cart-shipping.svg" alt="" srcset="" />
                                                        <div class="card-badge">3</div>
                                                </a>
                                        </li>
                                </ul>

                                <!-- Mobile Menu -->
                                <ul class="navbar-nav d-block d-lg-none">
                                        <li class="nav-item">
                                                <a href="#" class="nav-link"> Hi, Angga </a>
                                        </li>
                                        <li class="nav-item">
                                                <a href="#" class="nav-link d-inline-block"> Cart </a>
                                        </li>
                                </ul>
                        </div>
                </div>
        </nav> --}}

        <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
                <div class="container-fluid">
                        <div class="dashboard-heading">
                                <h2 class="dashboard-title">Transactions</h2>
                                <p class="dashboard-subtitle">
                                        Big result start from the small one
                                </p>
                        </div>
                        <div class="dashboard-content">
                                <div class="row mt-3">
                                        <div class="col-12 mt-2">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sell Product</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Buy Product</a>
                                                        </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                                @foreach ($sell_transaksi as $transaksi)
                                                                <a href="{{ route('dashboard-transaction-details', $transaksi->id) }}" class="card card-list d-block">
                                                                        <div class="card-body">
                                                                                <div class="row">
                                                                                        <div class="col-md-1">
                                                                                                <img class="w-50" src="{{ Storage::url($transaksi->product->galleries->first()->photos ?? '') }}" alt="" srcset="" />
                                                                                        </div>
                                                                                        <div class="col-md-4">{{ $transaksi->product->name }}</div>
                                                                                        <div class="col-md-3">{{ $transaksi->product->user->store_name }}</div>
                                                                                        <div class="col-md-3">{{ $transaksi->created_at }}</div>
                                                                                        <div class="col-md-1 d-md-block d-none">
                                                                                                <img src="/images/dashboard-arrow-right.svg" alt="" srcset="" />
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </a>
                                                                @endforeach
                                                                
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                @foreach ($buy_transaksi as $transaksi)
                                                                <a href="{{ route('dashboard-transaction-details', $transaksi->id) }}" class="card card-list d-block">
                                                                        <div class="card-body">
                                                                                <div class="row">
                                                                                        <div class="col-md-1">
                                                                                                <img class="w-50" src="{{ Storage::url($transaksi->product->galleries->first()->photos) ?? '' }}" alt="" srcset="" />
                                                                                        </div>
                                                                                        <div class="col-md-4">{{ $transaksi->product->name }}</div>
                                                                                        <div class="col-md-3">{{ $transaksi->product->user->store_name }}</div>
                                                                                        <div class="col-md-3">{{ $transaksi->created_at }}</div>
                                                                                        <div class="col-md-1 d-md-block d-none">
                                                                                                <img src="/images/dashboard-arrow-right.svg" alt="" srcset="" />
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </a>
                                                                @endforeach
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection