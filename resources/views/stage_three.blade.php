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
                <div class="name mt-5">
                  <h3 class="title">Stage 2/3: UPLOAD CREDENTIALS</h3>
                </div>
              </div>
            </div>
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

          <div class="alert alert-info fade show" role="alert">
            Make sure to upload past export Contract Bill of Laden and test results on commodities your company trades, in the <b>other company documents</b> section.
          </div>

          <form method="POST" action="{{ '/companies/'.$slug.'/reg_documents'}}" enctype="multipart/form-data">
            @csrf
            <h4>Upload required documents</h4>
            <div class="form-row">  
              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="CAC_Certificate">Upload CAC Certificate</label>
                <input type="file" class="form-control-file" name="cac_certificate" id="CAC_Certificate" required>
              </div>

              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="CAC1_1">Upload CAC 1.1</label>
                <input type="file" class="form-control-file" name="cac_1_1" id="CAC1_1" required>
              </div>

              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="memart">Upload Memart</label>
                <input type="file" class="form-control-file" name="memart" id="memart" required>
              </div>

              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="nepc_certificate">Upload NEPC Certificate</label>
                <input type="file" class="form-control-file" name="nepc_certificate" id="nepc_certificate" required>
              </div>
            </div>

            <br>          

            <h4>Other company documents</h4>
            <div class="form-row">  
              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="other_document_one">Document 1</label>
                <input type="file" class="form-control-file" id="other_document_one"  name="others[]">
              </div>

              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="other_document_two">Document 2</label>
                <input type="file" class="form-control-file"  name="others[]" id="other_document_two">
              </div>

              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="other_document_three">Document 3</label>
                <input type="file" class="form-control-file"  name="others[]" id="other_document_three">
              </div>

              <div class="form-group col-md-3" style="border: 1px solid #34A35E; padding: 0.5%;">
                <label class="file-label" for="other_document_four">Document 4</label>
                <input type="file" class="form-control-file" name="others[]" id="other_document_four">
              </div>
            </div>

            @if ($update)
              <button type="submit" class="btn btn-primary" style="background: #34A35E;">Update</button>              
            @else
              <button type="submit" class="btn btn-primary" style="background: #34A35E;">Next</button>
              <small>make payment</small>  
            @endif            
          </form>
        </div>
      </div>
    </div>
@endsection
