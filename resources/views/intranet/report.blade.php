@extends('layouts/layoutMaster')

@section('title', 'Hesabat')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"></span> <br> {{ $vehicle->vehicle_plate}}
</h4>


<div class="card">
  <h5 class="card-header">Hesabat tarixi: {{$start_date}} - {{$end_date}}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th rowspan="2">Ayın tarixi</th>
          <th rowspan="2">Sex Adı</th>
          <th rowspan="2">Yol vərəqinin №</th>
          <th rowspan="2">Avtomobilin Dövlət Nişanı</th>
          <th colspan="2">Zaman göstəriciləri</th>
          <th colspan="3">Yol göstəriciləri</th>
        </tr>
        <tr>
          <th>Çıxdığı vaxt</th>
          <th>Qayıtdığı vaxt</th>
          <th>Günün əvvəlinə</th>
          <th>Günün sonuna</th>
          <th class="border-1">Fərq</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($waysheets as $item)
        <tr>
          <td>{{ $item->waysheet_date}}</td>
          <td>ANS</td>
          <td>
            № {{ $item->waysheet_no}}
          </td>
          <td> @php  $vehicle_plate = DB::table('vehicles')->where('id', $item->vehicle_id)->first(); @endphp {{$vehicle_plate->vehicle_plate}}</td>
          <td>
            {{ $item->gar_exit_time}}
          </td>
          <td>
            {{ $item->gar_entry_time}}
          </td>
          <td>
            {{ number_format($item->startofday_odometer, 0, '.', ',') 	}} km
          </td>
          <td>
            {{  number_format($item->endofday_odometer, 0, '.', ',')  	}} km
          </td>
          <td>
            {{ number_format($item->endofday_odometer - $item->startofday_odometer, 0, '.', ',')	}} km
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->












@endsection
