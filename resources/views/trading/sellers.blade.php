@extends('layouts.trading.app')
@include('layouts.trading.nav')

@section('content')
    <body class="landing-page sidebar-collapse">
        @yield('nav')  
        
        <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('trading/img/d.jpg') }}'); background-size: cover;">
            <div class="container">
                <img class="img overlay-image" src="{{ asset('trading/img/x.svg') }}" style="background-size: cover; position: relative; width: 100%;">
            </div>
        </div>

        <div class="main main-raised col-md-11 offset-md" style="margin-top: -40%; padding: 3%;">
            <div class="container">
                <div class="section" id="verified_merchants">
                    <div class="card col-md-12 offset-md" style="">
                        <br>
                        <h3 class="card-title text-center">"{{ strtoupper(request()->commodity) }}" products listed by merchants</h3>
                        <div class="row">
                            @if (count($sellers) > 0)
                                @foreach ($sellers as $s)
                                    <div class="col-md-3 ml-auto mr-auto">
                                        <div class="card card-pricing bg-primary">
                                            <div class="card-body" id="merchant-list" style="">
                                                <!-- <div class="icon">
                                                    <i class="material-icons">stars</i>
                                                </div> -->

                                                {{--  <!--  Remember, verified merchants will be listed first. The "<small>" element below is how we'll identify verified merchants -->   --}}
                                                {{--  <small id="verified">AgX Verified &nbsp;<i class="material-icons">stars</i></small>  --}}
                                                <img src="{{ $s->photo }}" alt="Raised Image" class="img-raised rounded img-fluid">

                                                <h4 class="card-title">{{ ucfirst($s->commodity) }}</h4>
                                                <p class="card-description">
                                                    <i class="material-icons">money</i>&nbsp; ${{ $s->price }}/MT <br>
                                                    <i class="material-icons">location_on</i>&nbsp; {{ $s->location }}<br>
                                                    {{--  <i class="material-icons">flag</i>&nbsp; Nigeria  --}}
                                                </p>
                                                
                                                <a href="single_product_page_seller.html" class="btn btn-round">Contact &nbsp;<i class="material-icons">chat</i></a>
                                            </div>
                                        </div>
                                    </div> 
                                @endforeach                                 
                            @else
                                <p>No trades at the moment.</p>
                            @endif
                            
                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                    {{--  <small id="verified">AgX Verified &nbsp;<i class="material-icons">stars</i></small>  --}}
                                    <img src="{{ asset('trading/img/products/g.jpg') }}" alt="Raised Image" class="img-raised rounded img-fluid">
                                    <h4 class="card-title">Palm oil</h4>
                                    <p class="card-description">
                                        <i class="material-icons">money</i>&nbsp; $5,000/MT <br>
                                        <i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                        {{--  <i class="material-icons">flag</i>&nbsp; Nigeria  --}}
                                    </p>
                                    <a href="#pablo" class="btn btn-round">Contact &nbsp;<i class="material-icons">chat</i>.</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                    {{--  <small id="verified">AgX Verified &nbsp;<i class="material-icons">stars</i></small>  --}}
                                    <img src="{{ asset('trading/img/products/h.jpg') }}" alt="Raised Image" class="img-raised rounded img-fluid">
                                    <h4 class="card-title">Palm oil</h4>
                                    <p class="card-description">
                                        <i class="material-icons">money</i>&nbsp; $5,000/MT <br>
                                        <i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                        {{--  <i class="material-icons">flag</i>&nbsp; Nigeria  --}}
                                    </p>
                                    <a href="#pablo" class="btn btn-round">Contact &nbsp;<i class="material-icons">chat</i>.</a>
                                    </div>
                                </div>
                            </div>    

                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                    {{--  <small id="verified">AgX Verified &nbsp;<i class="material-icons">stars</i></small>  --}}
                                    <img src="{{ asset('trading/img/products/i.jpg') }}" alt="Raised Image" class="img-raised rounded img-fluid">
                                    <h4 class="card-title">Palm oil</h4>
                                    <p class="card-description">
                                        <i class="material-icons">money</i>&nbsp; $5,000/MT <br>
                                        <i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                        {{--  <i class="material-icons">flag</i>&nbsp; Nigeria  --}}
                                    </p>
                                    <a href="#pablo" class="btn btn-round">Contact &nbsp;<i class="material-icons">chat</i>.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection