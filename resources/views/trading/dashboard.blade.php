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
                <div class="section section-white">
                    <div class="container">
                        <!-- nav pills -->
                        <div id="navigation-pills">
                            <div class="title">
                                <h3>Welcome to your dashboard</h3>
                            </div>

                            <div class="row">
                                <div class="col-lg-10 col-md-10 offset-md-1">
                                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
                                        <!--color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"-->
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#my_profile" role="tab" data-toggle="tab">
                                            <i class="material-icons">dashboard</i> My Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#my_marketplace" role="tab" data-toggle="tab">
                                            <i class="material-icons">schedule</i> My Marketplace
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#my_rfqs" role="tab" data-toggle="tab">
                                            <i class="material-icons">list</i> My RFQs
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#agric_investments" role="tab" data-toggle="tab">
                                            <i class="material-icons">schedule</i> Agric investments
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#assets_investments" role="tab" data-toggle="tab">
                                            <i class="material-icons">list</i> Assets Investments
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#trade_investments" role="tab" data-toggle="tab">
                                            <i class="material-icons">schedule</i> Trade Investments
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#export_investments" role="tab" data-toggle="tab">
                                            <i class="material-icons">list</i> Export Investments
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tab-space">
                                        <div class="tab-pane active" id="my_profile">
                                            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                                            <br>
                                            <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </div>

                                        <div class="tab-pane" id="my_marketplace">
                                            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                            <br>
                                            <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                        </div>

                                        <div class="tab-pane" id="my_rfqs">
                                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                            <br>
                                            <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                        </div>

                                        <div class="tab-pane" id="agric_investments">
                                            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after
                                            installed base benefits.
                                            <br>
                                            <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </div>

                                        <div class="tab-pane" id="assets_investments">
                                            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for
                                            real-time schemas.
                                            <br>
                                            <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                        </div>

                                        <div class="tab-pane" id="trade_investments">
                                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one
                                            customer service with robust ideas.
                                            <br>
                                            <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                        </div>

                                        <div class="tab-pane" id="export_investments">
                                            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after
                                            installed base benefits.
                                            <br>
                                            <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end nav pills -->
                    </div>
                </div>
            </div>
        </div>

@endsection