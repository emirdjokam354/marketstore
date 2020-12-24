@extends('layouts.dashboard')

@section('title')
Store Dashboard Products Create
@endsection

@section('content')
<!-- Page Contents -->
<div id="page-content-wrapper">
        <nav style="display: none" class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
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
        </nav>

<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
                <div class="dashboard-heading">
                        <h2 class="dashboard-title">Create New Product</h2>
                        <p class="dashboard-subtitle">Create your own product</p>
                </div>
                <div class="dashboard-content">
                        <div class="row">
                                <div class="col-12">
                                        @if($errors->any())
                                                <div class="alert alert-danger">
                                                <ul>
                                                        @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                </ul>
                                                </div>
                                        @endif
                                        <form action="{{ route('dashboard-products-create-product') }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                                <div class="card">
                                                        <div class="card-body">
                                                                <div class="row">
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <label for="produk">Product Name</label>
                                                                                        <input type="text" class="form-control" name="name" id="produk" />
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <label for="price">Price</label>
                                                                                        <input type="number" class="form-control" name="price" id="price" />
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                        <label for="category">Category</label>
                                                                                        <select name="categories_id" class="form-control">
                                                                                                @foreach ($categories as $category)
                                                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                        <label for="deskripsi">Description</label>
                                                                                        <textarea name="description" id="editor"></textarea>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                        <label for="thumbnail">Thumbnails</label>
                                                                                        <input type="file" name="photo" class="form-control" id="thumbnail" />
                                                                                        <p class="text-muted">Kamu dapat memilih lebih dari satu file</p>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col text-right">
                                                                                <button type="submit" class="btn btn-success px-5">
                                                                                        Save Now
                                                                                </button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace("editor");
</script>
@endpush