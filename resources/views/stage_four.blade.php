@extends('layouts.app')
@include('layouts.nav')

@section('content')
  <body class="profile-page sidebar-collapse">  
    @yield('nav')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/d.jpg') }}');"></div>

    <div class="main main-raised">
      <div class="profile-content" style="padding: 0% 2% 4% 2%;">
        <div class="container">
          <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
              <div class="profile">
                {{--  <div class="avatar">
                  <img src="{{ asset('img/dd.jpg') }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>  --}}
                <div class="name mt-5">
                  <h3 class="title">Stage 3/3: PAYMENT</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="description text-center">
            <p>Please proceed to make payment</p>
          </div>

          @if (Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>{!! Session::get('status') !!}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
          @endif          

          <form method="POST" action="{{ route('reg_payment') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email}}"/>
            <input type="hidden" name="amount" value="1850000"/>
            <input type="hidden" name="currency" value="NGN"/>
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"/>
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"/>
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['company_id' => $company]) }}"/>
            
            <p>Click the button below to make a payment of <b>N18,500</b>.</p>
            <button type="submit" class="btn btn-primary" style="background: #34A35E;">Pay N18,500</button>
          </form>
        </div>
      </div>
    </div>
@endsection