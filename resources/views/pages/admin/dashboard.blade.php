@extends('layouts.admin')

@section('title')
Store Dashboard
@endsection

@section('content')
<!-- Page Contents -->
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
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
        </nav>

        <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
                <div class="container-fluid">
                        <div class="dashboard-heading">
                                <h2 class="dashboard-title">Admin Dashboard</h2>
                                <p class="dashboard-subtitle">This is BWAStore Administrator Panel</p>
                        </div>
                        <div class="dashboard-content">
                                <div class="row">
                                        <div class="col-md-4">
                                                <div class="card mb-2">
                                                        <div class="card-body">
                                                                <div class="dashboard-card-title">Customer</div>
                                                                <div class="dashboard-card-subtitle">{{ $customer }}</div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="card mb-2">
                                                        <div class="card-body">
                                                                <div class="dashboard-card-title">Revenue</div>
                                                                <div class="dashboard-card-subtitle">${{ $revenue }}</div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="card mb-2">
                                                        <div class="card-body">
                                                                <div class="dashboard-card-title">Transaction</div>
                                                                <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection