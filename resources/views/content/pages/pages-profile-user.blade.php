@extends('layouts/layoutMaster')

@section('title', 'İstifadəçi Profili - Profil')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
@endsection

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-profile.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Profil </span>
</h4>


<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header-banner">
        <img src="{{asset('assets/img/pages/profile-banner.png')}}" alt="Banner image" class="rounded-top">
      </div>
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          <img src="{{Auth::user()->profile_photo_url}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{ Auth::user()->fullname }}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item">
                  <i class='mdi mdi mdi-account-tie me-1 mdi-20px'></i><span class="fw-semibold">{{ Auth::user()->position }}</span>
                </li>
                <li class="list-inline-item">
                  <i class='mdi mdi-map-marker-outline me-1 mdi-20px'></i><span class="fw-semibold">{{ Auth::user()->department}}</span>
                </li>
                <li class="list-inline-item">
                  <i class='mdi mdi-calendar-blank-outline me-1 mdi-20px'></i><span class="fw-semibold"> {{ Auth::user()->started_work }} </span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='mdi mdi-account-outline me-1 mdi-20px'></i>Profil</a></li>
    </ul>
  </div>
</div>
<!--/ Navbar pills -->

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <small class="card-text text-uppercase text-muted">Haqqında</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-semibold mx-2">Adı və Soyadı:</span> <span>{{ Auth::user()->fullname }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-star-outline mdi-24px"></i><span class="fw-semibold mx-2">Vəzifə:</span> <span>Baş {{ Auth::user()->position}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-flag-outline mdi-24px"></i><span class="fw-semibold mx-2">Ölkə:</span> <span>{{ Auth::user()->country}}</span></li>
        </ul>
        <small class="card-text text-uppercase text-muted">Əlaqələr</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-semibold mx-2">Əlaqə:</span> <span>{{ Auth::user()->phone_number}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-email-outline mdi-24px"></i><span class="fw-semibold mx-2">Email:</span> <span>{{ Auth::user()->email}}</span></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-xl-8 col-lg-7 col-md-7">
    <div class="card mb-4">
      <div class="card-body">
        <small class="card-text text-uppercase text-muted">İş təcrübəsi</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-semibold mx-2">Adı və Soyadı:</span> <span>{{ Auth::user()->fullname }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-star-outline mdi-24px"></i><span class="fw-semibold mx-2">Vəzifə:</span> <span>{{ Auth::user()->position}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-flag-outline mdi-24px"></i><span class="fw-semibold mx-2">Ölkə:</span> <span>{{ Auth::user()->country}}</span></li>
        </ul>
        <small class="card-text text-uppercase text-muted">Əlaqələr</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-semibold mx-2">Daxili nömrə:</span> <span>{{ Auth::user()->internal_number}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-semibold mx-2">Əlaqə:</span> <span>{{ Auth::user()->phone_number}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="mdi mdi-email-outline mdi-24px"></i><span class="fw-semibold mx-2">Email:</span> <span>{{ Auth::user()->email}}</span></li>
        </ul>
      </div>
    </div>

  </div>
</div>

@endsection
