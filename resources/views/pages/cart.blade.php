@extends('layouts.app')

@section('title')
Store Cart Page
@endsection

@section('content')
<!-- Page Contents -->
<div class="page-content page-cart">
<section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
                <div class="row">
                        <div class="col-12">
                                <nav>
                                        <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                        <a href="/index.html">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active">Cart</li>
                                        </ol>
                                </nav>
                        </div>
                </div>
        </div>
</section>

<section class="store-cart">
        <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-12 table-responsive">
                                <table class="table table-borderless table-cart">
                                        <thead>
                                                <tr>
                                                        <th>Image</th>
                                                        <th>Name &amp; Seller</th>
                                                        <th>Price</th>
                                                        <th>Menu</th>
                                                </tr>
                                        </thead>
                                        @php
                                        $totalPrice = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                        <tr>
                                                @if ($cart->product->galleries)
                                                <td style="width:20%">
                                                        <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" alt="" class="cart-image" />
                                                </td>
                                                @endif
                                                <td style="width:35%">
                                                        <div class="product-title">{{ $cart->product->name }}</div>
                                                        <div class="product-subtitle">{{ $cart->user->store_name }}</div>
                                                </td>
                                                <td style="width:35%">
                                                        <div class="product-title">${{ number_format($cart->product->price) }}</div>
                                                        <div class="product-subtitle">USD</div>
                                                </td>
                                                <form action="{{ route('cart-delete', $cart->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <td style="width:20%">
                                                        <button type="submit" class="btn btn-remove-cart">Remove</button>
                                                </td>
                                                </form>
                                        </tr>
                                        @php
                                                $totalPrice += $cart->product->price
                                        @endphp
                                        @endforeach
                                </table>
                        </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                                <hr>
                        </div>
                        <div class="col-12">
                                <h4 class="mb-4">Shipping Details</h4>
                        </div>
                </div>
        <form action="{{ route('checkout')}}" enctype="multipart/form-data" method="post" id="locations">
                @csrf
                <input type="hidden" name="total_price" value="{{ $totalPrice }}">
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <input type="text" class="form-control" id="address_one" name="address_one" value="Setra Duta Cemara">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input type="text" class="form-control" id="address_two" name="address_two" value="Blok B2 No. 34">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="province" v-model="province_id">
                                        <option v-for="provinsi in province" :value="provinsi.id">@{{ provinsi.name }}</option>
                                </select>
                                <select class="form-control" v-else>

                                </select>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                                <label for="regencies_id">City</label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regency" v-model="regency_id">
                                        <option v-for="kota in regency" :value="kota.id">@{{ kota.name }}</option>
                                </select>
                                <select class="form-control" v-else>
                                </select>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="40512">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="Indonesia">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="phone_number">Phone_number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="+628 2020 11111">
                        </div>
                </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                        <hr>
                </div>
                <div class="col-12">
                        <h2 class="mb-1">Payment Informations</h2>
                </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-4 col-md-2">
                        <div class="product-title">$10</div>
                        <div class="product-subtitle">Country Tax</div>
                </div>
                <div class="col-4 col-md-3">
                        <div class="product-title">$280</div>
                        <div class="product-subtitle">Product Insurance</div>
                </div>
                <div class="col-4 col-md-2">
                        <div class="product-title">$580</div>
                        <div class="product-subtitle">Ship to Jakarta</div>
                </div>
                <div class="col-4 col-md-2">
                        <div class="product-title text-success">${{ number_format($totalPrice ?? 0) }}</div>
                        <div class="product-subtitle">Total</div>
                </div>
                <div class="col-8 col-md-3">
                        <button type="submit" class="btn btn-success px-4 btn-block mt-4">Checkout Now</button>
                </div>
        </div>
        </form>
        </div>
</section>
</div>

@endsection
@push('addon-script')
        <script src="/vendor/vue/vue.js"></script>
        <script src="https://unpkg.com/vue-toasted"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
        var locations = new Vue({
                el: "#locations",
                mounted() {
                        AOS.init();
                        this.getDataProvinces();
                },
                data: {
                        province: null,
                        regency: null,
                        province_id: null,
                        regency_id: null,
                },
                methods: {
                        getDataProvinces(){
                                var self = this;
                                axios.get('{{ route('api-provinces') }}')
                                .then(function(response) {
                                        self.province = response.data;
                                })
                        },
                        getDataRegencies(){
                                var self = this;
                                axios.get('{{ url('api/regencies') }}/' + self.province_id)
                                .then(function(response) {
                                        self.regency = response.data;
                                })
                        }
                },
                watch: {
                        province_id: function(val, oldVal){
                                this.regency_id = null;
                                this.getDataRegencies();
                        }
                }
        })
        </script>
@endpush
