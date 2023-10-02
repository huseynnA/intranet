@extends('layouts/layoutMaster')

@section('title', 'Qonaq qəbulu ')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/laravel-user-management.js')}}"></script>
@endsection

@section('content')

<div class="row g-5 mb-5">
  <div class="col-sm-5 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Gözlənilən</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$todays}}</h3>
            </div>
            <small>Bugün</small>
          </div>
          <span class="avatar">
            <span class="avatar-initial bg-label-primary rounded">
              <i class="mdi mdi-account-outline mdi-24px"></i>
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-5 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Davam edən</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$todays_daxil}}</h3>
            </div>
            <small>Bügün </small>
          </div>
          <span class="avatar">
            <span class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-account-check-outline mdi-24px"></i>
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-5 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Tamamlanan</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$todays_cixis}}</h3>
            </div>
            <small>Bu gün</small>
          </div>
          <span class="avatar">
            <span class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-account-multiple-outline mdi-24px"></i>
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-5 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Təxirə salınıb</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">5</h3>
            </div>
            <small>Recent analytics</small>
          </div>
          <span class="avatar">
            <span class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-account-circle-outline mdi-24px"></i>
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>


</div>

<div class="col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">Son 10 qonağın hərəkətləri</h5>
    </div>
    <div class="card-body">
      <ul class="p-0 m-0">
        <li class="d-flex mb-3 justify-content-between pb-2">
          <h6 class="mb-0 small">Qonaq</h6>
          <h6 class="mb-0 small">Statusu</h6>
        </li>
        @foreach ($list as $item)
        <li class="d-flex mb-4">
          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
            <div class="me-2">
              <h6 class="mb-0">{{ $item->fullname}}</h6>
              <small class="text"> Dəvət edən şöbə və əməkdaş: {{ $item->division}}</small>
              <small class="text">{{ $item->emekdas}}</small><br>
              <small class="text">Tel: {{ $item->nomre}}</small>
            </div>
           @if(empty($item->cixis) && empty($item->giris))  <div class="badge bg-label-primary rounded-pill"> Gözlənir @elseif(empty($item->cixis)) <div class="badge bg-label-danger rounded-pill"> Daxil olub @else <div class="badge bg-label-success rounded-pill"> Çıxıb @endif</div>
          </div>
        </li>
        @endforeach

      </ul>
    </div>
  </div>
</div>
@endsection
