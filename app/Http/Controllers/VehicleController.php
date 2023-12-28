<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleMarks;
use App\Models\VehicleType;
use App\Models\VehicleTon;
use App\Models\VehicleMotor;
use App\Models\VehicleStatus;
use App\Models\VehicleNov;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class VehicleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function vehicleindex()
  {
    $vehicles = Vehicle::all();
    $marks = VehicleMarks::all();
    $types = VehicleType::all();
    $tons = VehicleTon::all();
    $motors = VehicleMotor::all();
    $status = VehicleStatus::all();
    $novs = VehicleNov::all();

    return view('intranet.vehicle')
      ->with('marks', $marks)
      ->with('types', $types)
      ->with('tons', $tons)
      ->with('motors', $motors)
      ->with('status', $status)
      ->with('novs', $novs);
  }

  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'vehicle_plate',
      3 => 'vehicle_year',
      4 => 'vehicle_power',
      5 => 'vehicle_averages',
      6 => 'id_vehicle_type',
    ];

    $search = [];

    $totalData = Vehicle::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    // $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $vehicles = Vehicle::offset($start)
        ->limit($limit)
        // ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $vehicles = Vehilce::where('vehicle_plate', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        // ->orderBy($order, $dir)
        ->get();

      $totalFiltered = User::where('vehicle_plate', 'LIKE', "%{$search}%")->count();
    }

    $data = [];

    if (!empty($vehicles)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($vehicles as $item) {
        $type = VehicleType::select('title')
          ->where('id', $item->id_vehicle_type)
          ->pluck('title');
        $mark = VehicleMarks::select('title')
          ->where('id', $item->id_vehicle_marks)
          ->pluck('title');
        $ton = VehicleTon::select('title')
          ->where('id', $item->id_vehicle_tons)
          ->pluck('title');
        $motor = VehicleMotor::select('title')
          ->where('id', $item->id_vehicle_motors)
          ->pluck('title');
        $nov = VehicleNov::select('title')
          ->where('id', $item->id_vehicle_novs)
          ->pluck('title');
        $status = VehicleStatus::select('title')
          ->where('id', $item->id_vehicle_statuses)
          ->pluck('title');
        $nestedData['id'] = $item->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['vehicle_plate'] = $item->vehicle_plate;
        $nestedData['vehicle_year'] = $item->vehicle_year;
        $nestedData['vehicle_power'] = $item->vehicle_power;
        $nestedData['vehicle_averages'] = $item->vehicle_averages;
        $nestedData['vehicle_hour_avg'] = $item->vehicle_hour_avg;
        $nestedData['vehicle_day_norm'] = $item->vehicle_day_norm;
        $nestedData['id_vehicle_type'] = $type;
        $nestedData['id_vehicle_marks'] = $mark;
        $nestedData['id_vehicle_tons'] = $ton;
        $nestedData['id_vehicle_motors'] = $motor;
        $nestedData['id_vehicle_novs'] = $nov;
        $nestedData['id_vehicle_statuses'] = $status;
        $nestedData['vehicle_odometer'] = number_format($item->vehicle_odometer, 0, '.', ',');

        $data[] = $nestedData;
      }
    }

    if ($data) {
      return response()->json([
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval($totalData),
        'recordsFiltered' => intval($totalFiltered),
        'code' => 200,
        'data' => $data,
      ]);
    } else {
      return response()->json([
        'message' => 'Internal Server Error',
        'code' => 500,
        'data' => [],
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $vehicle_id = $request->id;

    if ($vehicle_id) {
      // update the value
      $vehicles = Vehicle::updateOrCreate(
        ['id' => $vehicle_id],
        [
          'vehicle_plate' => $request->vehicle_plate,
          'vehicle_year' => $request->vehicle_year,
          'vehicle_fuel_norm' => $request->vehicle_fuel_norm,
          'vehicle_power' => $request->vehicle_power,
          'vehicle_averages' => $request->vehicle_averages,
          'vehicle_hour_avg' => $request->vehicle_hour_avg,
          'vehicle_day_norm' => $request->vehicle_day_norm,
          'vehicle_odometer' => $request->vehicle_odometer,
          'id_vehicle_type' => $request->id_vehicle_type,
          'id_vehicle_fuels' => $request->id_vehicle_fuels,
          'id_vehicle_marks' => $request->id_vehicle_marks,
          'id_vehicle_tons' => $request->id_vehicle_tons,
          'id_vehicle_motors' => $request->id_vehicle_motors,
          'id_vehicle_statuses' => $request->id_vehicle_statuses,
          'id_vehicle_novs' => $request->id_vehicle_novs,
        ]
      );

      // user updated
      return response()->json('dəyişdirildi');
    } else {
      // create new one if email is unique
      $vehicle_plate = Vehicle::where('vehicle_plate', $request->vehicle_plate)->first();

      if (empty($vehicle_plate)) {
        $vehicle = Vehicle::updateOrCreate(
          ['id' => $vehicle_id],
          [
            'vehicle_plate' => $request->vehicle_plate,
            'vehicle_year' => $request->vehicle_year,
            'vehicle_power' => $request->vehicle_power,
            'vehicle_averages' => $request->vehicle_averages,
            'vehicle_hour_avg' => $request->vehicle_hour_avg,
            'vehicle_day_norm' => $request->vehicle_day_norm,
            'vehicle_odometer' => $request->vehicle_odometer,
            'id_vehicle_type' => $request->id_vehicle_type,
            'id_vehicle_fuels' => $request->id_vehicle_fuels,
            'id_vehicle_marks' => $request->id_vehicle_marks,
            'id_vehicle_tons' => $request->id_vehicle_tons,
            'id_vehicle_motors' => $request->id_vehicle_motors,
            'id_vehicle_statuses' => $request->id_vehicle_statuses,
            'id_vehicle_novs' => $request->id_vehicle_novs,
          ]
        );

        // user created
        return response()->json('yaradıldı.');
      } else {
        // user already exist
        return response()->json(['message' => 'already exits'], 422);
      }
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $where = ['id' => $id];

    $vehicle = Vehicle::where($where)->first();

    return response()->json($vehicle);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
