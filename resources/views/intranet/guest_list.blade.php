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
              <h3 class="mb-0 me-2">2</h3>
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
              <h3 class="mb-0 me-2">3</h3>
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
              <h3 class="mb-0 me-2">4</h3>
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
  <div class="col-sm-5 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>İmtina edilib</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">4</h3>
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

</div>
@endsection
