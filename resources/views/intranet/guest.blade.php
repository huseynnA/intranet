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
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
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
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/guest-managment.js')}}"></script>
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection

@section('content')

<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Qonaqların siyahısı</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-guests table">
      <thead class="table-light">
        <tr>
          <th></th>
          <th>Id</th>
          <th>Ad və Soyad</th>
          <th>Qəbul edən əməkdaş və şöbə</th>
          <th>Zİyarətİn növü</th>
          <th>Gəlmə tarİxİ və Saat</th>
          <th>Gİrİş</th>
          <th>Çıxış</th>
          <th>Hərəkət</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Offcanvas to add new guest -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddGuest" aria-labelledby="offcanvasAddGuestLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddGuestLabel" class="offcanvas-title">Yeni Qonaq</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-guest pt-0" id="addNewGuestForm">
        <input type="hidden" name="id" id="guest_id">
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-guest-fullname" placeholder="Ramin Şıxəliyev" name="name" aria-label="John Doe" />
          <label for="add-guest-fullname">Ad və Soyadı</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-guest-division" class="form-select" name="division">
            <option value="İnsan resursları">İnsan resursları</option>
            <option value="İnformasiya texnologoiyaları">İnformasiya texnologoiyaları</option>
          </select>
          <label for="add-guest-division">Qəbul edən şöbə</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-guest-nov" class="form-select" name="nov">
            <option value="Vətəndaş">Vətəndaş</option>
            <option value="Əməkdaş">Əməkdaş</option>
            <option value="Qonaq">Qonaq</option>
          </select>
          <label for="add-guest-nov">İlkin ziyarət növü</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-guest-emekdas" class="select2 form-select" name="emekdas">
            <option value="">Seçim et</option>
            <option value="Ramin Şıxəliyev">Ramin Şıxəliyev</option>
            <option value="Anar Həsənov">Anar Həsənov</option>
          </select>
          <label for="add-guest-emekdas">Qəbul edən əməkdaş</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" id="add-guest-phone" class="form-control" placeholder="+994 50 0000000" aria-label="+994 50000000" name="phone" />
          <label for="add-guest-phone">Əlaqə nömrəsi</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" placeholder="YYYY-MM-DD HH24:MM" id="flatpickr-datetime" name="tarix"/>
            <label for="flatpickr-datetime">Tarix və saat</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" id="add-guest-purpose" name="purpose" class="form-control" placeholder="İşlə bağlı" aria-label="" />
          <label for="add-guest-purpose">Məqsədi</label>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">TƏSDİQ ET</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">İMTİNA</button>
      </form>
    </div>
  </div>
</div>
@endsection
