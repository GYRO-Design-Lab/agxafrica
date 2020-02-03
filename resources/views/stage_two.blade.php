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
                <div class="avatar">
                  <img src="{{ asset('img/dd.jpg') }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <div class="name">
                  <h3 class="title">Stage 1/3: UPDATE COMPANY INFORMATION</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="description text-center">
            <p>Please fill out the form below</p>
          </div>

          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ $message }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
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

          <form method="POST" action="/companies/{{ $company->slug }}" class="stage_2_form">
            @method('PUT')
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="confirm_company_name">Company Name</label>
                <input type="text" class="form-control" disabled id="confirm_company_name" value="{{ $company->name }}">
              </div>

              <div class="form-group col-md-6">
                <label for="confirm_company_email">Company Address</label>
                <input type="text" class="form-control" disabled id="confirm_company_email" value="{{ $company->address }}">
              </div>
            </div>

            <br>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="CAC_registration_number">CAC Registration No</label>
                @csrf<input type="text" class="form-control" name="cac_reg" id="CAC_registration_number" value=" {{ $company->cac_reg }}" required>
              </div>

              <div class="form-group col-md-6">
                <label for="NEPC_registration_number">NEPC Registration Number</label>
                <input type="text" class="form-control" name="nepc_reg" id="NEPC_registration_number" value=" {{ $company->nepc_reg }}" required>
              </div>            
            </div>

            <br>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $company->contact_person }}" required>
              </div>
              <div class="form-group col-md-3">
                <label for="contact_person_phone_no">Phone number</label>
                <input type="text" class="form-control" id="contact_person_phone_no" name="contact_phone" value="{{ $company->contact_phone }}" required>
              </div>

              <div class="form-group col-md-3">
                <label for="contact_person_email">Email</label>
                <input type="email" class="form-control" id="contact_person_email" name="contact_email" value="{{ $company->contact_email }}" required>
              </div>
              
              <div class="form-group col-md-3">
                <label for="contact_person_position">Position</label>
                <input type="text" class="form-control" id="contact_person_position" name="contact_position" value="{{ $company->contact_position }}" required>
              </div>
            </div>            
            
            <br>
            {{--  handle commodities  --}}
            <div class="form-row">
              <label class="col-md-12">Commodities</label>
                
              @foreach ($company->commodities as $commodity => $properties)
                <div class="form-group col-md-4 commodities_group">
                  <input type="text" class="form-control" name="commodities[]" placeholder="Commodity" value="{{ $commodity }}" readonly required>
                </div>

                <div class="form-group col-md-4 commodities_group">
                  <select class="form-control selectpicker" data-style="btn btn-link" name="import_export[]" required>
                    <option selected="" disabled="">do you import or export this commodity?</option>
                    <option value="Export" 
                      @if($properties != '' &&  $properties[0] === 'Export')
                        selected="selected"
                      @endif                      
                    >
                      Export
                    </option>

                    <option value="Import"
                      @if($properties != '' &&  $properties[0] === 'Import')
                        selected="selected"
                      @endif 
                    >
                      Import
                    </option>                    
                  </select>
                </div>

                <div class="form-group col-md-4 commodities_group">
                  <input type="number" class="form-control" name="quantities[]" placeholder="quantity per month" required 
                    @if($properties != '')
                      value="{{ $properties[1] }}"
                    @endif
                  >
                </div>              
              @endforeach              
            </div>

            <br>            

            <button type="submit" class="btn btn-primary" style="background: #34A35E;">Next</button>
            <small>upload company documents</small>
          </form>
        </div>
      </div>
    </div>
@endsection