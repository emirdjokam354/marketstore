@extends('layouts.dashboard')

@section('title')
Store Dashboard Transactions Details
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
                                <h2 class="dashboard-title">{{ $transaction->transaction->code }}</h2>
                                <p class="dashboard-subtitle">Transactions Details</p>
                        </div>
                        <div class="dashboard-content" id="transactionsDetails">
                                <div class="row">
                                        <div class="col-12">
                                                <div class="card">
                                                        <div class="card-body">
                                                                <div class="row">
                                                                        <div class="col-12 col-md-4">
                                                                                <img src="{{ Storage::url($transaction->product->galleries->first()->photos) }}" class="w-100" alt="" srcset="" />
                                                                        </div>
                                                                        <div class="col-12 col-md-8">
                                                                                <div class="row">
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Customer Name</div>
                                                                                                <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Product Name</div>
                                                                                                <div class="product-subtitle">
                                                                                                        {{ $transaction->product->name }}
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">
                                                                                                        Date of Transaction
                                                                                                </div>
                                                                                                <div class="product-subtitle">
                                                                                                        {{ $transaction->created_at }}
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Payment Status</div>
                                                                                                <div class="product-subtitle text-danger">
                                                                                                        {{ $transaction->transaction->transaction_status }}
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Total Amount</div>
                                                                                                <div class="product-subtitle">${{ number_format($transaction->transaction->total_price) }}</div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Mobile</div>
                                                                                                <div class="product-subtitle">
                                                                                                        {{ $transaction->transaction->user->phone_number }}
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                        <div class="col-12 mt-4">
                                                                                <h5>Shipping Information</h5>
                                                                        </div>
                                                                        <div class="col-12">
                                                                                <div class="row">
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Address I</div>
                                                                                                <div class="product-subtitle">
                                                                                                        {{ $transaction->transaction->user->address_one }}
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Address II</div>
                                                                                                <div class="product-subtitle">
                                                                                                        {{ $transaction->transaction->user->address_two }}
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Province</div>
                                                                                                <div class="product-subtitle">{{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}</div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">City</div>
                                                                                                <div class="product-subtitle">{{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}</div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Postal Code</div>
                                                                                                <div class="product-subtitle">{{ $transaction->transaction->user->zip_code }}</div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                                <div class="product-title">Country</div>
                                                                                                <div class="product-subtitle">{{ $transaction->transaction->user->country }}</div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-3">
                                                                                                <div class="product-title">Shipping Status</div>
                                                                                                <select name="shipping_status" class="form-control" id="status" v-model="status">
                                                                                                        <option value="PENDING">Pending</option>
                                                                                                        <option value="SHIPPING">Shipping</option>
                                                                                                        <option value="SUCCESS">Success</option>
                                                                                                </select>
                                                                                        </div>
                                                                                        <template v-if="status == 'SHIPPING'">
                                                                                                <div class="col-md-3">
                                                                                                        <div class="product-title">Input Resi</div>
                                                                                                        <input type="text" class="form-control" name="resi" v-model="resi" />
                                                                                                </div>
                                                                                                <div class="col-md-2">
                                                                                                        <button type="submit" class="btn btn-success btn-block mt-4">
                                                                                                                Update Resi
                                                                                                        </button>
                                                                                                </div>
                                                                                        </template>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                        <div class="col-12 text-right">
                                                                                <button type="submit" class="btn btn-success btn-lg px-5">Save Now</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection
@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
var transactionsDetails = new Vue({
el: "#transactionsDetails",
data: {
        status: "{{ $transaction->shipping_status }}",
        resi: "{{ $transaction->resi }}",
},
});
</script>
@endpush