<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">        

    {{--  <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">  --}}
    
    {{--  Fonts and icons  --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    <link href="{{ asset('css/material-kit.css?v=2.0.6') }}" rel="stylesheet" />    
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />    
</head>

    @yield('content')

    {{--  footer  --}}
    <footer class="footer footer-default">
        <div class="container">
            <div class="copyright">
                AgX Africa
                &copy;
                <script>
                document.write(new Date().getFullYear())
                </script> 
                
                {{--  made with <i class="material-icons">favorite</i> <a href="" target="_blank" style="color:#34A35E;"></a> for a better web.  --}}
            </div>
        </div>
    </footer>

    {{-- Core JS Files --}}
    <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    
    {{-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker --}}
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

    {{-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ --}}
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>

    {{-- Google Maps Plugin --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    
    {{-- Control Center for Material Kit: parallax effects, scripts for the example pages etc --}}
    <script src="{{ asset('js/material-kit.js?v=2.0.6') }}" type="text/javascript"></script>

    {{-- custom --}}
    <script>
        var limit = 3;
        $('input.commodities_checkbox').on('change', function(evt) {
            {{-- alert('hey'); --}}
            if($(this).siblings(':checked').length >= limit) {
                this.checked = false;
            }
        });
    </script>
    
</body>
</html>
