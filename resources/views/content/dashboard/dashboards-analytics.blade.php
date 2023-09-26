@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Əsas səhifə')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-statistics.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-analytics.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('assets/js/dashboards-ecommerce.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">

  <!-- Sessions line chart -->
  <div class="col-lg-2 col-sm-6">
    <div class="card h-100">
      <div class="card-header pb-0">
        <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
          <h6 class="mb-0 me-2">{{ Str::ucfirst(Carbon\Carbon::today()->locale('az')->dayName);}} </h6> <br>
        </div>

      </div>
      <div class="card-body"> <br>
        <h1 class="mb-0 me-2">{{ Str::ucfirst(Carbon\Carbon::today()->locale('az')->day);}} </h1> <br>
        <h4 class="mb-0 me-2">{{ Str::ucfirst(Carbon\Carbon::today()->locale('az')->monthName);}} {{ Str::ucfirst(Carbon\Carbon::today()->locale('az')->year);}} </h4>
      </div>
    </div>
  </div>

  <!-- Statistics Total Order -->
  <div class="col-lg-2 col-sm-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
          <div class="avatar">
            <div class="avatar-initial bg-label-primary rounded">
              <i class="mdi mdi-currency-usd mdi-12px"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <p class="mb-0 text-success me-1">Valyutalar</p>
            <i class="mdi mdi-chevron-down text-success"></i>
          </div>
        </div>
        <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
          <h5 class="mb-2">USD/AZN 1.7000 </h5>
          <h5 class="mb-2"> EUR/AZN 1.8109 </h5>
          <h5 class="mb-2"> GBP/AZN 2.0879</h5>
        </div>
        <h6 class="mb-0 me-2">{{ Str::ucfirst(Carbon\Carbon::today()->locale('az')->day);}} {{ Str::ucfirst(Carbon\Carbon::today()->locale('az')->monthName);}}  </h6>
      </div>
    </div>
  </div>
  <!--/ Statistics Total Order -->
  <!-- Total Transactions & Report Chart -->
  <div class="col-lg-8">
    <div class="swiper-container swiper-container-horizontal swiper text-bg-primary" id="swiper-weekly-sales-with-bg">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-2">Doğum günü olanlar <span>🎉</span></h5>
            </div>
            <div class="row">
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
               <a href="http://127.0.0.1:8000/pages/profile-user" > <h2 class="text-white mt-0 mt-md-3 mb-3 py-1">Ramin Şıxəliyev</h2> </a>
                <div class="row">
                  <div class="col-12">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-3 align-items-center">
                        <p class="mb-0 me-2 weekly-sales-text-bg-primary">Şöbə:</p>
                        <p class="mb-0">İnformasiya texnologiyaları </p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 me-2 weekly-sales-text-bg-primary">Daxili nömrə: </p>
                        <p class="mb-0"> 1209 </p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-2 my-md-0 text-center">
                <img src="{{asset('assets/img/avatars/1.png')}}"  height="180" class="w-px-150 h-auto rounded-circle">
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-2">Doğum günü olanlar <span>🎉</span></h5>
            </div>
            <div class="row">
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
               <a href="http://127.0.0.1:8000/pages/profile-user" > <h2 class="text-white mt-0 mt-md-3 mb-3 py-1">Ayna Abdullayeva</h2> </a>
                <div class="row">
                  <div class="col-12">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-3 align-items-center">
                        <p class="mb-0 me-2 weekly-sales-text-bg-primary">Şöbə:</p>
                        <p class="mb-0">İnsan resursları </p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 me-2 weekly-sales-text-bg-primary">Daxili nömrə: </p>
                        <p class="mb-0"> 1209 </p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-2 my-md-0 text-center">
                <img src="{{asset('assets/img/avatars/2.png')}}"  height="180" class="w-px-150 h-auto rounded-circle">
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-2">Doğum günü olanlar <span>🎉</span></h5>
            </div>
            <div class="row">
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
               <a href="http://127.0.0.1:8000/pages/profile-user" > <h2 class="text-white mt-0 mt-md-3 mb-3 py-1">Anar Həsənov</h2> </a>
                <div class="row">
                  <div class="col-12">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-3 align-items-center">
                        <p class="mb-0 me-2 weekly-sales-text-bg-primary">Şöbə:</p>
                        <p class="mb-0">İnformasiya texnologiyaları </p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 me-2 weekly-sales-text-bg-primary">Daxili nömrə: </p>
                        <p class="mb-0"> 1209 </p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-2 my-md-0 text-center">
                <img src="{{asset('assets/img/avatars/3.png')}}"  height="180" class="w-px-150 h-auto rounded-circle" alt="weekly sales" >
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <!--/ Weekly Sales with bg-->


  <!--/ Sessions line chart -->





  <!-- Project Statistics -->
  <div class="col-md-6 col-xl-4">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Yeni işə qəbul olanlar</h5>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-3 justify-content-between pb-2">
            <h6 class="mb-0 small">Ad və Soyad</h6>
            <h6 class="mb-0 small">Vəzifə</h6>
          </li>
          <li class="d-flex mb-4">
            <div class="avatar avatar-md flex-shrink-0 me-3">
              <div class="avatar-initial bg-lighter rounded">
                <div>
                  <img src="{{asset('assets/img/avatars/1.png')}}" alt="User" class="h-25">
                </div>
              </div>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Ramin Şıxəliyev</h6>
                <small class="text-muted">İnformasiya Texnologiyaları</small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Baş mütəxəssis</div>
            </div>
          </li>
          <li class="d-flex mb-4">
            <div class="avatar avatar-md flex-shrink-0 me-3">
              <div class="avatar-initial bg-lighter rounded">
                <div>
                  <img src="{{asset('assets/img/avatars/2.png')}}" alt="User" class="h-25">
                </div>
              </div>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Şəhla Hüseynova</h6>
                <small class="text-muted">İnsan resursları</small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Mütəxəssis</div>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
  <!--/ Project Statistics -->

  <!-- Multiple widgets -->
  <div class="col-md-6 col-xl-4">
    <div class="row g-4">
      <!-- Total Revenue chart -->
      <div class="col-md-6 col-sm-6">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
              <h4 class="mb-0 me-2">HR Portal</h4>
            </div>
          </div>
          <div class="card-body">
            <span class="mdi mdi-human-capacity-decrease mdi-24px"></span>
          </div>
        </div>
      </div>
      <!--/ Total Revenue chart -->

      <div class="col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-success rounded">
                  <i class="mdi mdi-currency-usd mdi-24px"></i>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <p class="mb-0 text-success me-1">+38%</p>
                <i class="mdi mdi-chevron-up text-success"></i>
              </div>
            </div>
            <div class="card-info mt-4 pt-3">
              <h5 class="mb-2">$13.4k</h5>
              <p class="text-muted">Total Sales</p>
              <div class="badge bg-label-secondary rounded-pill mt-1">Last Sales </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-info rounded">
                  <i class="mdi mdi-link mdi-24px"></i>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <p class="mb-0 text-success me-1">+62%</p>
                <i class="mdi mdi-chevron-up text-success"></i>
              </div>
            </div>
            <div class="card-info mt-4 pt-4">
              <h5 class="mb-2">142.8k</h5>
              <p class="text-muted">Total Impression</p>
              <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
            </div>
          </div>
        </div>
      </div>
      <!-- overview Radial chart -->
      <div class="col-md-6 col-sm-6">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
              <h4 class="mb-0 me-2">$67.1k</h4>
              <p class="mb-0 text-success">+49%</p>
            </div>
            <span class="d-block mb-2 text-muted">Overview</span>
          </div>
          <div class="card-body">
            <div id="overviewChart" class="d-flex align-items-center"></div>
          </div>
        </div>
      </div>
      <!--/ overview Radial chart -->
    </div>
  </div>
  <!--/ Multiple widgets -->

  <!-- Sales Country Chart -->
  <div class="col-12 col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Sales Country</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="salesCountryDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesCountryDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
        <p class="mb-0 text-muted">Total $42,580 Sales</p>
      </div>
      <div class="card-body pb-1 px-0">
        <div id="salesCountryChart"></div>
      </div>
    </div>
  </div>
  <!--/ Sales Country Chart -->






</div>
@endsection
