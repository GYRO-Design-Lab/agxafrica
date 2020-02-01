<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    AgX Africa
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.6" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
          AgX Africa </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/agxafrica" target="_blank" data-original-title="Follow us on Twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/agxafrica" target="_blank" data-original-title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/agxafrica" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/ddd.jpg')">
    <div class="container">
      @if(Session::has('reg_done'))      
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong>{{ Session::get('reg_done')}}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="tru value=""e">&times;</span>
          </button>
        </div>
      @endif

      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Africa's largest online commodities exchange</h1>
          <!-- <h4>Africa's largest online commodities market </h4> -->
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
            <h2 class="text-center title">Fill out the registration form</h2>
            <!-- <h4 class="text-center description">Please fill out the form below</h4> -->

            {{-- <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>Thanks for registering on AGX Africa | Africa's largest online commodities market</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="tru value=""e">&times;</span>
              </button>
            </div> --}}

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
                <textarea type="text" class="form-control" rows="2" name="company_address" id="company_address" required></textarea>
              </div>

              <br>

              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="commodities">Commodities</label>
                    <select multiple class="form-control selectpicker" data-style="btn btn-link" id="commodities" style="min-height: 70px;" name="commodities[]" required>
                      <option selected="" disabled="">Select Commodities</option>
                      <option value="Metals">Metals</option>
                      <option value="Energy">Energy</option>
                      <option value="Livestock & Meat">Livestock & Meat</option>
                      <option value="Forest Products">Forest Products</option>
                    </select>
                  </div>
                </div>
              </div>
              
              <br>

              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised" style="" type="submit">
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




  <footer class="footer footer-default">
    <div class="container">

      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> 
        <a href="" target="_blank" style="color:#34A35E;"></a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
</body>

</html>
