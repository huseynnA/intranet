<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\WaySheet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WaySheetController extends Controller
{

  public function __construct()
  {
      $this->middleware('machinist');
  }
  public function waysheet()
  {
    $vehicles = Vehicle::all();
    return view('intranet.waysheet')->with('vehicles', $vehicles);
  }
  public function waysheetpost(Request $request)
  {
    $vehicle = Vehicle::find($request->vehicle_id);
    $yurus = $vehicle->vehicle_odometer;
    $request->validate([
      'endofday_odometer' => 'numeric|min:' . $yurus,
      'vehicle' => 'requrid',
    ]);

    $waysheet = new waysheet();
    $waysheet->waysheet_no = $request->waysheet_no;
    $waysheet->waysheet_date = $request->waysheet_date;
    $waysheet->vehicle_id = $request->vehicle_id;
    $waysheet->gar_exit_time = $request->gar_exit_time;
    $waysheet->gar_entry_time = $request->gar_entry_time;
    $waysheet->endofday_odometer = $request->endofday_odometer;
    $waysheet->fuel_start = $request->fuel_start;
    $waysheet->fuel_add = $request->fuel_add;
    $waysheet->fuel_spent = $request->fuel_spent;
    $waysheet->startofday_odometer = $yurus;
    $waysheet->save();

    $vehicles = Vehicle::updateOrCreate(
      ['id' => $request->vehicle_id],
      [
        'vehicle_odometer' => $request->endofday_odometer,
      ]
    );

    // return redirect()->route('waysheet');

    return redirect()->route('waysheet');
  }

  public function reportindex()
  {
    $vehicles = Vehicle::all();
    return view('intranet.report_index')->with('vehicles', $vehicles);
  }

  public function report(Request $request)
  {
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $vehicle = Vehicle::find($request->vehicle_id);
    $waysheets = waysheet::whereBetween('waysheet_date', [$request->start_date, $request->end_date])->get();

    return view('intranet.report')
      ->with('vehicle', $vehicle)
      ->with('waysheets', $waysheets)
      ->with('start_date', $start_date)
      ->with('end_date', $end_date);
  }
}
