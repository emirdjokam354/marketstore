@extends('layouts.dashboard')

@section('title')
Account Settings
@endsection

@section('content')
<!-- Page Contents -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Account</h2>
      <p class="dashboard-subtitle">Update your current profile</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" method="POST" enctype="multipart/form-data" id="locations">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Your Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="addressOne">Address 1</label>
                      <input type="text" class="form-control" id="addressOne" name="address_one" value="{{ $user->address_one }}" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="addressTwo">Address 2</label>
                      <input type="text" class="form-control" id="addressTwo" name="address_two" value="{{ $user->address_two }}" />
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
                      <label for="postalCode">Postal Code</label>
                      <input type="text" class="form-control" id="addressTwo" name="zip_code" value="{{ $user->zip_code }}" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="country">Country</label>
                      <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="phone_number" value="{{ $user->phone_number }}" />
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