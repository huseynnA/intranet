@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Rəhbərlik')

@section('content')

<div class="row gy-4">
  <div class="col-md-12 col-lg-12">
    <div class="card h-100">
      <div class="d-flex align-items-end row">
        <div class="col-md-6 text-center text-md-end order-1 order-md-2">
          <div class="card-body pb-0 px-0 px-md-4 ps-0">
            <img src="{{asset('assets/img/illustrations/1.jpg')}}" height="400" class="w-px-400 h-auto rounded-circle" data-app-light-img="illustrations/1.jpg" data-app-dark-img="illustrations/1.jpg">
          </div>
        </div>
        <div class="col-md-6 order-2 order-md-1">
          <div class="card-body">
            <h2 class="card-title pb-xl-2">Anar  Həsənov </h2>
            <p class="mb-0">İcraçı direktor </p>
            <p class="pb-2"></p>
            <a href="javascript:;" class="btn btn-primary">Ətraflı məlumat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-lg-12">
    <div class="card h-100">
      <div class="d-flex align-items-end row">
        <div class="col-md-6 text-center text-md-end order-1 order-md-2">
          <div class="card-body pb-0 px-0 px-md-4 ps-0">
            <img src="{{asset('assets/img/illustrations/2.jpg')}}" height="400" class="w-px-400 h-auto rounded-circle" data-app-light-img="illustrations/2.jpg" data-app-dark-img="illustrations/2.jpg">
          </div>
        </div>
        <div class="col-md-6 order-2 order-md-1">
          <div class="card-body">
            <h2 class="card-title pb-xl-2">Toğrul Novruzov </h2>
            <p class="mb-0">İcraçı direktor köməkçisi</p>
            <p class="pb-2"></p>
            <a href="javascript:;" class="btn btn-primary">Ətraflı məlumat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
