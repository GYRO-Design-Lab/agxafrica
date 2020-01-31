
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

<body class="profile-page sidebar-collapse">
  
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


  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/d.jpg');"></div>



  <div class="main main-raised">
    <div class="profile-content" style="padding: 0% 2% 4% 2%;">
      <div class="container">

        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="assets/img/dd.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Stage 2/3: VERIFICATION</h3>
              </div>
            </div>
          </div>
        </div>


        <div class="description text-center">
          <p>Please fill out the form below</p>
        </div>

        @if(Session::has('status'))
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ Session::get('status') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
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

        <form method="POST" action="/companies/{{ Session::get('slug') }}">
          @method('PUT')
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="confirm_company_name">Company Name</label>
              <input type="text" class="form-control" disabled id="confirm_company_name" value=" {{ Session::get('company_name') }}">
            </div>
            <div class="form-group col-md-6">
              <label for="confirm_company_email">Company Address</label>
              <input type="text" class="form-control" disabled id="confirm_company_email" value=" {{ Session::get('company_address') }}">
            </div>

          </div>

          <br>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="CAC_registration_number">CAC Registration No</label>
              @csrf<input type="text" class="form-control" name="cac_reg" id="CAC_registration_number" placeholder="CAC Reg. No" required>
            </div>

            <div class="form-group col-md-6">
              <label for="NEPC_registration_number">NEPC Registration Number</label>
              <input type="text" class="form-control" name="nepc_reg" id="NEPC_registration_number" placeholder="NEPC Reg. No" required>
            </div>
            
          </div>

          {{-- <br>

          <div class="form-group">
            <label for="confirm_company_address">Confirm Company Address</label>
            <input type="text" class="form-control" disabled="" name="confirm_company_address" id="confirm_company_address" placeholder="Company Address">
          </div> --}}

          <br>


          <div class="form-row">

            <div class="form-group col-md-4">
              <label for="inputEmail4">Commodities</label>
              <input type="text" class="form-control" id="commodity" name="commodities[]" placeholder="Commodity" value=" {{ Session::get('commodities') }}" disabled required>
            </div>
            <div class="form-group col-md-4">
              <label for="do_you_import_this_commodity">Do you import or export this commodity?</label>
              <select class="form-control selectpicker" data-style="btn btn-link" id="do_you_import_this_commodity" name="commodities[]" required>
                <option selected="" disabled="">Import / Export </option>
                <option value="import">Import</option>
                <option value="export">Export</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="quantity_per_month">Quantity per month</label>
              <input type="number" class="form-control" name="commodities[]" id="quantity_per_month" placeholder="Quantity per month" required>
            </div>
          </div>

          <br>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="contact_person">Contact Person</label>
              <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact person" required>
            </div>
            <div class="form-group col-md-3">
              <label for="contact_person_phone_no">Phone number</label>
              <input type="text" class="form-control" id="contact_person_phone_no" name="contact_phone" placeholder="Contact person's phone no" required>
            </div>

            <div class="form-group col-md-3">
              <label for="contact_person_email">Email</label>
              <input type="email" class="form-control" id="contact_person_email" name="contact_email" placeholder="Contact person's Email" required>
            </div>
            
            <div class="form-group col-md-3">
              <label for="contact_person_position">Position</label>
              <input type="text" class="form-control" id="contact_person_position" name="contact_position" placeholder="Contact person's Position" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary" style="background: #34A35E;">Submit</button>
        </form>
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
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
</body>

</html>
