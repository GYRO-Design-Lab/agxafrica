@extends('layouts.app')
@include('layouts.nav')

@section('content')
  <body class="profile-page">
    @yield('nav')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/wood.jpg') }}');">
      <div class="container">
      </div>
    </div>

    <div class="main main-raised">
      <div class="container">
        <div class="section section-contacts" id="registerNow">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <h2 class="text-center title">Merchants</h2>
              
              <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Verified</th>
                        <th scope="col">Paid</th>
                    </tr>
                </thead>

                @php
                    $n = 1;
                @endphp
                @foreach ($merchants as $m)
                    <tr>
                        <th scope="row">{{ $n }}</th>
                        <td>{{ $m->full_name }}</td>
                        <td><a href="tel:{{ $m->phone }}">{{ $m->phone }}</a></td>
                        <td>{{ $m->company }}</td>
                        <td class="text-center">
                            @if ($m->verified)
                                <i class="fa fa-check text-success"></i>
                            @else
                                <i class="fa fa-times text-danger"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($m->paid)
                                <i class="fa fa-check text-success"></i>
                            @else
                                <i class="fa fa-times text-danger"></i>
                            @endif
                        </td>
                    </tr>
                    @php $n++; @endphp
                @endforeach
              </table>

              {{ $merchants->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
