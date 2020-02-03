@extends('layouts.app')
@include('layouts.nav')

@section('content')
  <body class="landing-page sidebar-collapse">
    @yield('nav')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/ddd.jpg') }}');">
      <div class="container">
        @if(Session::has('reg_done'))      
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{!! Session::get('reg_done') !!}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="tru value=""e">&times;</span>
            </button>
          </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div class="row">
          <div class="col-md-6">
            <h1 class="title">Online commodities exchange</h1>
            <br>
            <a href="#registerNow" class="btn btn-danger btn-raised btn-lg" style="background: #34A35E">
              <i class="fa fa-edit"></i> Register today
            </a>
          </div>
        </div> 
      </div>
    </div>

    <div class="main main-raised">
      <div class="container">
        <div class="section section-contacts" id="registerNow">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <h2 class="text-center title">Register</h2>
              {{-- <h2 class="text-center title">Fill out the registration form</h2> --}}

              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif

              <form class="contact-form" method="POST" action="/register">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Full Name</label>
                      @csrf<input type="text" class="form-control" name="full_name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email" class="bmd-label-floating">Email</label>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone</label>
                      <input type="phone" class="form-control" name="phone" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="company_name" class="bmd-label-floating">Company Name</label>
                      <input type="text" class="form-control" name="company_name" required>
                    </div>
                  </div>                
                </div>

                <div class="form-group">
                  <label for="company_address" class="bmd-label-floating">Company Address</label>
                  <input type="text" class="form-control" name="company_address" id="company_address" required/>
                </div>

                <br>

                <div class="row">
                  <div class="col-md-12 select-commodities">
                    <div class="form-group">
                      <label for="commodities">Commodities - <small>select a maximum of three (3)</small></label>
                      <br>
                      {{-- <select multiple class="form-control selectpicker" data-style="btn btn-link" id="commodities" style="height: auto;" size="6" name="commodities[]" required>
                        <option disabled>Select Commodities</option>
                        <option value="Agricultural">Agricultural</option>
                        <option value="Energy">Energy</option>
                        <option value="Forest Products">Forest Products</option>
                        <option value="Livestock & Meat">Livestock & Meat</option>
                        <option value="Metals">Metals</option>
                      </select> --}}
                      
                      <input class="commodities_checkbox" type="checkbox" name="commodities[]" value="Agricultural" id="agricultural"/> <label for="agricultural">Agricultural</label> &nbsp;
                      <input class="commodities_checkbox" type="checkbox" name="commodities[]" value="Energy" id="energy"/> <label for="energy">Energy</label> &nbsp;
                      <input class="commodities_checkbox" type="checkbox" name="commodities[]" value="Forest Products" id="forest_products"/> <label for="forest_products">Forest Products</label> &nbsp;
                      <input class="commodities_checkbox" type="checkbox" name="commodities[]" value="Livestock & Meat" id="livestock_meat"/> <label for="livestock_meat">Livestock & Meat</label> &nbsp;
                      <input class="commodities_checkbox" type="checkbox" name="commodities[]" value="Metals" id="metals"/> <label for="metals">Metals</label> &nbsp;
                    </div>
                  </div>
                </div>
                
                <br>

                <div class="row">
                  <div class="col-md-4 ml-auto mr-auto text-center">
                    <button class="btn btn-primary btn-raised" type="submit">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
