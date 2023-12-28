@extends('layouts/layoutMaster')

@section('title', 'Yeni Yol vərəqəsi')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection



@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"></span> Yeni Yol vərəqəsi
</h4>
@if($errors->any())
<div class="col-md mb-4 mb-md-0">
  <div class="card">
    <h5 class="card-header">Xəbərdarlıq</h5>
    <div class="card-body">
      @foreach ($errors->all() as $error)
  <div class="alert alert-danger" role="alert">{{$error}}</div>
  @endforeach
    </div>
  </div>
</div>
<hr>
@endif
<div class="row">
  <div class="col-md">
    <div class="card mb-12">
      <h5 class="card-header">Avtomobil seçimi</h5>
      <div class="card-body">
        <form class="add-new-Vehicle pt-0" method="post" action="{{ route('waysheetpost') }}" accept-charset="UTF-8">
          @csrf
          <div class="form-floating form-floating-outline">
            <select id="select2Basic" name="vehicle_id" class="select2 form-select form-select-lg" data-allow-clear="true" required>

           @foreach($vehicles as $item)
            <option value="{{$item->id}}">{{$item->vehicle_plate}} Son yürüşü: {{$item->vehicle_odometer}} km </option>
        @endforeach
          </select>
          <label >Avtomobil</label>
        </div>
        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Yol vərəqinin №</label>
          <input id="number" value="{{ old('waysheet_no') }}"  name="waysheet_no" class="form-control form-control-lg" type="number" placeholder="233349" required/>
        </div>
        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Tarix</label>
          <input id="number" value="{{ old('waysheet_date') }}" name="waysheet_date" class="form-control form-control-lg" type="date"  required/>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <!-- Form controls -->
  <div class="col-md-4">
    <div class="card mb-4">
      <h5 class="card-header">Zaman göstəriciləri</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="form-floating form-floating-outline mb-4">
          <input type="time" value="{{ old('gar_exit_time') }}" name="gar_exit_time" class="form-control" id="exampleFormControlInput1" placeholder="11:30" required/>
          <label for="exampleFormControlInput1">Qarajdan çıxdığı vaxt</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="time" value="{{ old('gar_entry_time') }}" name="gar_entry_time" class="form-control" id="exampleFormControlInput1" placeholder="11:30" required/>
          <label for="exampleFormControlInput1">Qaraja qayıtdığı vaxt</label>
        </div>
      </div>
    </div>
  </div>

  <!-- Input Sizing -->
  <div class="col-md-4">
    <div class="card mb-4">
      <h5 class="card-header">Yol göstəriciləri</h5>
      <div class="card-body">
        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Günün sonuna (km)</label>
          <input id="text" value="{{ old('endofday_odometer') }}" name="endofday_odometer" class="form-control form-control-lg" type="text" placeholder="245000" required/>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card mb-4">
      <h5 class="card-header">Yancaq göstəriciləri</h5>
      <div class="card-body">
        <div class="mt-2 mb-3">
          <label for="largeInput"  class="form-label">Günün əvvəlinə (litr) </label>
          <input id="number" name="fuel_start" value="{{ old('fuel_start') }}" class="form-control form-control-lg" type="text" placeholder="5" required/>
        </div>
        <div class="mt-2 mb-3">
          <label for="largeInput"  class="form-label">Əlavə olunan (litr)</label>
          <input id="number" name="fuel_add"  value="{{ old('fuel_add') }}" class="form-control form-control-lg" type="text" placeholder="35" required/>
        </div>
        <div class="mt-2 mb-3">
          <label for="largeInput"  class="form-label">Sərf olunan (litr)</label>
          <input id="number" name="fuel_spent" value="{{ old('fuel_spent') }}" class="form-control form-control-lg" type="text" placeholder="35" required/>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">TƏSDİQ ET</button>
    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">İMTİNA</button>
  </form>
  </div>
</div>
@endsection
