@extends('layouts/layoutMaster')

@section('title', 'Avtomobil siyahısı ')

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
<script src="{{asset('js/vehicle-managment.js')}}"></script>
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection

@section('content')

<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Avtomobil siyahısı</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-Vehicles table">
      <thead class="table-light">
        <tr>
          <th></th>
          <th>Id</th>
          <th>Dövlət nömrə nişanı</th>
          <th>Markası/İli/Tonajı/Gücü</th>
          <th>Tipi/ Motor tipi</th>
          <th>Növləri</th>
          <th>Ümumi yürüş</th>
          <th>Sex</th>
          <th>Hərəkət</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Offcanvas to add new Vehicle -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddVehicle" aria-labelledby="offcanvasAddVehicleLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddVehicleLabel" class="offcanvas-title">Yeni Avtomobil</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-Vehicle pt-0" id="addNewVehicleForm">
        <input type="hidden" name="id" id="vehicle_id">
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-plate" placeholder="99-TR-001" name="vehicle_plate" aria-label="99-TR-001" />
          <label for="add-Vehicle-plate">Dövlət nömrə nişanı</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-Vehicle-mark" class="form-select" name="id_vehicle_marks">
            @foreach ($marks as $item)
            <option value="{{ $item->id}}">{{ $item->title}}</option>
            @endforeach
          </select>
          <label for="add-Vehicle-mark">A/maşının markası</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-year" placeholder="2016" name="vehicle_year" aria-label="2016" />
          <label for="add-Vehicle-year">Buraxılış ili</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-vehicle-type" class="form-select" name="id_vehicle_type">
            @foreach ($types as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
          </select>
          <label for="add-Vehicle-type">A/maşının tipi</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-vehicle-tons" class="form-select" name="id_vehicle_tons">
            @foreach ($tons as $item)
            <option value="{{ $item->id}}">{{ $item->title}}</option>
            @endforeach
          </select>
          <label for="add-Vehicle-emekdas">Tonajı</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-power" placeholder="2445" value="{{ old('vehicle_power') }}" name="vehicle_power" aria-label="2445" />
          <label for="add-Vehicle-power">Gücü a/ğ</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-averege" placeholder="34.5" value="{{ old('vehicle_averages') }}" name="vehicle_averages" aria-label="2445" />
          <label for="add-Vehicle-averege">100 km yürüş üçün yanacaq sərfi norması (litr) </label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-hour-averege" placeholder="5.2" value="{{ old('vehicle_hour_avg') }}" name="vehicle_hour_avg" aria-label="2445" />
          <label for="add-Vehicle-hour-averege">Bir moto/saat üçün  yanacağın sərfi (litr) </label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-day-norm" placeholder="30" value="{{ old('vehicle_day_norm') }}" name="vehicle_day_norm" aria-label="2445" />
          <label for="add-Vehicle-day-norm">Bir gün. yanac norm. (litr) </label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-vehicle-motors" class="form-select" name="id_vehicle_motors">
            @foreach ($motors as $item)
            <option value="{{ $item->id}}">{{ $item->title}}</option>
            @endforeach
          </select>
          <label for="add-Vehicle-emekdas">Motor tipi</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="add-Vehicle-odometer" placeholder="461000" value="{{ old('vehicle_odometer') }}" name="vehicle_odometer" aria-label="2445" />
          <label for="add-Vehicle-odometer">Ümumi yürüş </label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-Vehicle-status" class="form-select" name="id_vehicle_statuses">
            @foreach ($status as $item)
            <option value="{{ $item->id}}">{{ $item->title}}</option>
            @endforeach
          </select>
          <label for="add-Vehicle-emekdas">Texniki vəziyyəti</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select id="add-vehicle-novs" class="form-select" name="id_vehicle_novs">
            @foreach ($novs as $item)
            <option value="{{ $item->id}}">{{ $item->title}}</option>
            @endforeach
          </select>
          <label for="add-Vehicle-emekdas">Avtomobilin Növü</label>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">TƏSDİQ ET</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">İMTİNA</button>
      </form>
    </div>
  </div>
</div>
@endsection
