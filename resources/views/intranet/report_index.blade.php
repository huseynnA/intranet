@extends('layouts/layoutMaster')

@section('title', 'Hesabat')

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
  <span class="text-muted fw-light"></span> Hesabat
</h4>
<div class="row">
  <div class="col-md">
    <div class="card mb-12">
      <h5 class="card-header">Avtomobil üzrə</h5>
      <div class="card-body">
        <form class="add-new-Vehicle pt-0" method="post" action="{{ route('waysheetreportpost') }}" accept-charset="UTF-8">
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
          <label for="largeInput" class="form-label">Başlanğıc</label>
          <input id="number" value="{{ old('start_date') }}" name="start_date" class="form-control form-control-lg" type="date"  required/>
        </div>
        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Son</label>
          <input id="number" value="{{ old('end_date') }}" name="end_date" class="form-control form-control-lg" type="date"  required/>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Hesabata Bax</button>
      </form>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <!-- Form controls -->
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Tarix üzrə Ümumi siyahı</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <form class="add-new-Vehicle pt-0" method="post" action="{{ route('waysheetpost') }}" accept-charset="UTF-8">
        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Başlanğıc</label>
          <input id="number" value="{{ old('start_date') }}" name="start_date" class="form-control form-control-lg" type="date"  required/>
        </div>
        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Son</label>
          <input id="number" value="{{ old('end_date') }}" name="end_date" class="form-control form-control-lg" type="date"  required/>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Hesabata Bax</button>
      </form>
      </div>
    </div>
  </div>

  <!-- Input Sizing -->

  <div class="col-md-4">


  </div>
</div>
@endsection
