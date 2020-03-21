<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Agx Africa') . ' - Trade Center'  }}</title>    
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('trading/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('trading/img/favicon.png') }}">  

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link href="{{ asset('trading/css/material-kit.css?v=2.0.6') }}" rel="stylesheet" />

    {{--  custom styles  --}}
    <style>
        .card-description > .material-icons {
            position: relative;
            top: 6px;
        }
    </style>
</head>

    @yield('content')

    {{--  footer  --}}
    <div class="section" id="footer" style="padding: 3%; width: 100%;">
        <div class="container">
            <div class="row" stye="padding: 2%;">
                <div class="col-md-3">
                    <h4>Quick links</h4>
                    <ul>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Terms and Conditions</a></li>
                        <li><a href="">Services & Products</a></li>
                        <li><a href="">Market Views</a></li>
                        <li><a href="">Data & Research</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>Quick links</h4>
                    <ul>
                        <li><a href="">How to trade</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">FAQs</a></li>
                        <li><a href="">Team</a></li>
                        <li><a href="">Social Media</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>Buyers</h4>
                    <ul>
                        <li><a href="">Create RFQs</a></li>
                        <li><a href="">Offline Sourcing</a></li>
                        <li><a href="">Latest Products</a></li>
                        <li><a href="">AgX LIVE</a></li>
                        <li><a href="">Search Verified Suppliers</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>Sellers</h4>
                    <ul>
                        <li><a href="">Search RFQs</a></li>
                        <li><a href="">Marketplace</a></li>
                        <li><a href="">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-default">
        <div class="container">
            <div class="copyright">
                AgX Africa
                &copy;
                <script>
                document.write(new Date().getFullYear())
                </script>                
            </div>
        </div>
    </footer>

    <!--   Core JS Files   -->
    <script src="{{ asset('trading/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('trading/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('trading/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('trading/js/plugins/moment.min.js') }}"></script>

    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('trading/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('trading/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>

    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('trading/js/material-kit.js?v=2.0.6') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });

        function scrollToDownload() {
            if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
            }
        }
    </script>    
</body>
</html>
