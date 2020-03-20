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
                <div class="row" id="landing_basket_section">
                    <div class="col-md-4 landing_basket" style="">
                        <table class="table table-hover table-bordered" style="">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="2">BUYERS</th>
                                </tr>
                                <tr>
                                    <th scope="col">Commodity</th>
                                    <th scope="col">Price [$/MT]</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($buyers))
                                    @foreach ($buyers as $b)
                                        <tr>
                                            <td><a href="">{{ $b->commodity }}</a></td>
                                            <td>{{ number_format($b->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>No trades</td></tr>
                                @endif
                                <tr>
                                    <td><a href="product_list_buyer.html">Cocoa</a></td>
                                    <td>2,500</td>
                                </tr>
                                <tr>
                                    <td><a href="">Cashew Nuts</a></td>
                                    <td>2,000</td>
                                </tr>
                                <tr>
                                    <td><a href="">Sesame Seeds</a></td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td><a href="">Cotton</a></td>
                                    <td>800</td>
                                </tr>
                                <tr>
                                    <td><a href="">Ginger</a></td>
                                    <td>1,800</td>
                                </tr>
                                <tr>
                                    <td><a href="">Soybean</a></td>
                                    <td>850</td>
                                </tr>
                                <tr>
                                    <td><a href="">Soybean Oil</a></td>
                                    <td>500</td>
                                </tr>
                                <tr>
                                    <td><a href="">Crayfish</a></td>
                                    <td>1,500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4 landing_basket" style="">
                        <table class="table table-hover table-bordered" style="">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="2">SELLERS</th>
                                </tr>
                                <tr>
                                    <th scope="col">Commodity</th>
                                    <th scope="col">Price [$/MT]</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($sellers))
                                    @foreach ($sellers as $s)
                                        <tr>
                                            <td><a href="">{{ $s->commodity }}</a></td>
                                            <td>{{ number_format($s->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>No trades</td></tr>
                                @endif
                                <tr>
                                    <td><a href="product_list_seller.html">Palm Oil</a></td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td><a href="">Azore</a></td>
                                    <td>550</td>
                                </tr>
                                <tr>
                                    <td><a href="">Charcoal</a></td>
                                    <td>850</td>
                                </tr>
                                <tr>
                                    <td><a href="">Ayin</a></td>
                                    <td>500</td>
                                </tr>
                                <tr>
                                    <td><a href="">Cat Fish</a></td>
                                    <td>1,500</td>
                                </tr>
                                <tr>
                                    <td><a href="">Ginger</a></td>
                                    <td>800</td>
                                </tr>
                                <tr>
                                    <td><a href="">Diesel</a></td>
                                    <td>500</td>
                                </tr>
                                <tr>
                                    <td><a href="">Brent Crude</a></td>
                                    <td>850</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4 landing_basket" style="">
                        <table class="table table-hover table-bordered" style="">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="3">AgX Live</th>
                                </tr>
                                <tr>
                                    <th scope="col">Commodity</th>
                                    <th scope="col">Price [$/MT]</th>
                                    <th scope="col" style="padding: 0;">
                                    <button id="trend" type="button" style="color: black" class="btn" data-toggle="tooltip" data-placement="top" title="Current status" data-container="body"><i class="material-icons">update</i></button>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (!empty($live_trades))
                                    @foreach ($live_trades as $l)
                                        <tr>
                                            <td><a href="">{{ $l->commodity }}</a></td>
                                            <td>{{ number_format($l->price, 2) }}</td>
                                            <td style="padding: 0;">
                                                <button id="trend" type="button" style="color: green;" class="btn" data-toggle="tooltip" data-placement="top" title="Stable" data-container="body"><i class="material-icons">trending_up</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>No trades</td></tr>
                                @endif

                                <tr>
                                    <td><a href="">Cocoa</a></td>
                                    <td>1,980</td>
                                    <td style="padding: 0;">
                                        <button id="trend" type="button" style="color: green;" class="btn" data-toggle="tooltip" data-placement="top" title="Stable" data-container="body"><i class="material-icons">trending_up</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Cashew</a></td>
                                    <td>1,280</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: red;" class="btn" data-toggle="tooltip" data-placement="top" title="Unstable" data-container="body"><i class="material-icons">trending_down</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Sesame Seeds</a></td>
                                    <td>1,300</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: green;" class="btn" data-toggle="tooltip" data-placement="top" title="Stable" data-container="body"><i class="material-icons">trending_up</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Cotton</a></td>
                                    <td>1,500</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: green;" class="btn" data-toggle="tooltip" data-placement="top" title="Stable" data-container="body"><i class="material-icons">trending_up</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Ginger</a></td>
                                    <td>2,100</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: red;" class="btn" data-toggle="tooltip" data-placement="top" title="Unstable" data-container="body"><i class="material-icons">trending_down</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Soybean</a></td>
                                    <td>850</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: green;" class="btn" data-toggle="tooltip" data-placement="top" title="Stable" data-container="body"><i class="material-icons">trending_up</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Crayfish</a></td>
                                    <td>770</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: green;" class="btn" data-toggle="tooltip" data-placement="top" title="Stable" data-container="body"><i class="material-icons">trending_up</i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="">Azobe</a></td>
                                    <td>850</td>
                                    <td style="padding: 0;">
                                    <button id="trend" type="button" style="color: red;" class="btn" data-toggle="tooltip" data-placement="top" title="Unstable" data-container="body"><i class="material-icons">trending_down</i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- landing_basket_section -->

                <!-- Verified Merchants -->

                <div class="section" id="verified_merchants">
                    <div class="card col-md-12 offset-md" style="">
                        <br>
                        <h3 class="card-title text-center">Some of our verified merchants</h3>
                        <div class="row">
                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                    <div class="icon">
                                        <i class="material-icons">stars</i>
                                    </div>
                                    <h4 class="card-title">GYRO Design Lab Company Limited</h4>
                                    <p class="card-description"><i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                    <i class="material-icons">badge</i>&nbsp; Cocoa, cashew nuts, azobe, palm oil, charcoal</p>
                                    <!-- <a href="#pablo" class="btn btn-white btn-round"><i class="material-icons">chat</i>.</a> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                    <div class="icon">
                                        <i class="material-icons">stars</i>
                                    </div>
                                    <h4 class="card-title">GYRO Design Lab Company Limited</h4>
                                    <p class="card-description"><i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                    <i class="material-icons">badge</i>&nbsp; Cocoa, cashew nuts, azobe, palm oil, charcoal</p>
                                    <!-- <a href="#pablo" class="btn btn-white btn-round"><i class="material-icons">chat</i>.</a> -->
                                    </div>
                                </div>
                            </div>    

                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                        <div class="icon">
                                            <i class="material-icons">stars</i>
                                        </div>
                                        <h4 class="card-title">GYRO Design Lab Company Limited</h4>
                                        <p class="card-description"><i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                        <i class="material-icons">badge</i>&nbsp; Cocoa, cashew nuts, azobe, palm oil, charcoal</p>
                                        <!-- <a href="#pablo" class="btn btn-white btn-round"><i class="material-icons">chat</i>.</a> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-primary">
                                    <div class="card-body" id="merchant-list" style="">
                                        <div class="icon">
                                            <i class="material-icons">stars</i>
                                        </div>
                                        <h4 class="card-title">GYRO Design Lab Company Limited</h4>
                                        <p class="card-description"><i class="material-icons">location_on</i>&nbsp; Banana Island, Lagos<br>
                                        <i class="material-icons">badge</i>&nbsp; Cocoa, cashew nuts, azobe, palm oil, charcoal</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4 offset-md-4">
                                <label for="delivery_location">Search verified merchants</label>
                                <input type="text" class="form-control" name="search_verified_merchants" id="search_verified_merchants" placeholder="Search verified merchant">
                                <a href="#">
                                    <button class="btn btn-primary" style="width: 100%">Go</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- /Verified Merchants -->

                <!-- RFQ -->
                <div class="section" id="rfq">
                    <div class="row">                
                        <div class="card col-md-7" style="">
                            <div class="card-body">
                                <h3 class="card-title">Request for quotation</h3>
                                <p class="card-text">An easy way to send buying requests to suppliers & get quotes quickly</p>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="Commodity">Commodity</label>
                                        <input type="text" class="form-control" name="Commodity" id="Commodity" placeholder="What commodity?">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="categogy">Category</label>
                                        <select id="categogy" class="form-control">
                                            <option selected>Choose category</option>
                                            <option>Agricultural</option>
                                            <option>Energy</option>
                                            <option>Forest Products</option>
                                            <option>Livestock & Meat</option>
                                            <option>Metal</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="specification">Specification</label>
                                        <input type="text" class="form-control" name="specification" id="specification" placeholder="Your specification">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="target_price">Target price</label>
                                        <input type="text" class="form-control" name="target_price" id="target_price" placeholder="What is your target price">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="quantity_requested_for">Quantity requested for</label>
                                        <input type="text" class="form-control" name="quantity_requested_for" id="quantity_requested_for" placeholder="Quantity">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="delivery_location">Delievery location</label>
                                        <input type="text" class="form-control" name="delivery_location" id="delivery_location" placeholder="Your preffered location">
                                    </div>

                                    <a href="#">
                                        <button class="btn btn-primary" style="width: 100%">
                                            Request for quotation &nbsp; <i class="material-icons">send</i> 
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" style="background-image: url(assets/img/rfq2.jpg); background-size: contain; min-height: 80%; border-radius: 2em;"></div>
                    </div>        
                </div>


                <!-- Trades we offer -->
                <div class="section" id="rfq">
                    <div class="row">
                        <div class="card col-md-12" style="">
                            <br>
                            <h3 class="card-title">Trades we offer</h3>
                            <div class="row">
                                <div class="card-body col-md-3">
                                    <h4 class="card-title">Escrow Services</h4><br>
                                    <p class="card-text">Lorem ipsum short description, lorem ipsum stable short description</p>
                                    <a href="#0" class="btn btn-primary">Explore &nbsp; <i class="material-icons">send</i></a>
                                </div>

                                <div class="card-body col-md-3">
                                    <h4 class="card-title">Trade Assurance</h4><br>
                                    <p class="card-text">Lorem ipsum short description, lorem ipsum stable short description</p>
                                    <a href="#0" class="btn btn-primary">Explore &nbsp; <i class="material-icons">send</i></a>
                                </div>

                                <div class="card-body col-md-3">
                                    <h4 class="card-title">AgX Capital [Financing solutions]</h4>
                                    <p class="card-text">Lorem ipsum short description, lorem ipsum stable short description</p>
                                    <a href="#0" class="btn btn-primary">Explore &nbsp; <i class="material-icons">send</i></a>
                                </div>

                                <div class="card-body col-md-3">
                                    <h4 class="card-title">Ocean & Air shipping [logistics services</h4>
                                    <p class="card-text">Lorem ipsum short description, lorem ipsum stable short description</p>
                                    <a href="#0" class="btn btn-primary">Explore &nbsp; <i class="material-icons">send</i></a>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>

                <!--warehouse-->
                <div class='section text-center'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h2 class="card-title">Do you have a warehouse?</h2>
                                <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
                                    Register your warehouse with us today
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/warehouse-->
            </div>
        </div>

@endsection