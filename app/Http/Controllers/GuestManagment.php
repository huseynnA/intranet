<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuestList;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class GuestManagment extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function GuestManagement()
  {
    #$users = GuestList::all();
    #$userCount = $users->count();
    #$verified = GuestList::whereNotNull('email_verified_at')
    #  ->get()
    #  ->count();
    #$notVerified = GuestList::whereNull('email_verified_at')
    #  ->get()
    #  ->count();
    #$usersUnique = $users->unique(['email']);
    #$userDuplicates = $users->diff($usersUnique)->count();

    #return view('intranet.guest_list', [
    #  'totalUser' => $userCount,
    #  'verified' => $verified,
    # 'notVerified' => $notVerified,
    #  'userDuplicates' => $userDuplicates,
    #]);
    $todays = GuestList::where('tarix', Carbon::today())->count();
    $todays_daxil = GuestList::whereNull('cixis')->count();
    $todays_cixis = GuestList::whereNotNull('cixis')->count();

    $list = GuestList::orderby('tarix')
      ->limit(10)
      ->get();

    return view('intranet.guest_list')
      ->with('todays', $todays)
      ->with('todays_daxil', $todays_daxil)
      ->with('todays_cixis', $todays_cixis)
      ->with('list', $list);
  }

  public function guestindex()
  {
    $users = GuestList::all();
    $userCount = $users->count();

    return view('intranet.guest');
  }

  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'name',
      3 => 'division',
      4 => 'nov',
      5 => 'emekdas',
      6 => 'phone',
      5 => 'tarix',
      5 => 'purpose',
    ];

    $search = [];

    $totalData = GuestList::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    // $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $guests = GuestList::offset($start)
        ->limit($limit)
        // ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $guests = GuestList::where('fullname', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        // ->orderBy($order, $dir)
        ->get();

      $totalFiltered = User::where('fullname', 'LIKE', "%{$search}%")->count();
    }

    $data = [];

    if (!empty($guests)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($guests as $user) {
        $nestedData['id'] = $user->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['name'] = $user->fullname;
        $nestedData['division'] = $user->division;
        $nestedData['nov'] = $user->nov;
        $nestedData['emekdas'] = $user->emekdas;
        $nestedData['purpose'] = $user->purpose;
        $nestedData['nomre'] = $user->nomre;
        $nestedData['tarix'] =
          Carbon::parse($user->tarix)->locale('az')->day .
          ' ' .
          Carbon::parse($user->tarix)->locale('az')->monthName .
          ' ' .
          Carbon::parse($user->tarix)->locale('az')->year .
          ' ' .
          Carbon::parse($user->tarix)
            ->locale('az')
            ->toTimeString();
        $nestedData['email_verified_at'] = $user->status;
        $nestedData['giris'] = $user->giris;
        $nestedData['cixis'] = $user->cixis;

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
    $userID = $request->id;

    if ($userID) {
      // update the value
      $users = GuestList::updateOrCreate(
        ['id' => $userID],
        [
          'fullname' => $request->name,
          'purpose' => $request->purpose,
          'division' => $request->division,
          'nomre' => $request->phone,
          'nov' => $request->nov,
          'tarix' => $request->tarix,
          'emekdas' => $request->emekdas,
        ]
      );

      // user updated
      return response()->json('dəyişdirildi');
    } else {
      // create new one if email is unique
      $userEmail = GuestList::where('fullname', $request->email)->first();

      if (empty($userEmail)) {
        $users = GuestList::updateOrCreate(
          ['id' => $userID],
          [
            'fullname' => $request->name,
            'purpose' => $request->purpose,
            'division' => $request->divison,
            'nomre' => $request->phone,
            'nov' => $request->nov,
            'tarix' => $request->tarix,
            'emekdas' => $request->emekdas,
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

    $guests = GuestList::where($where)->first();

    return response()->json($guests);
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

  public function guestenter($id)
  {
    $affected = DB::table('guest_lists')
      ->where('id', $id)
      ->update(['giris' => Carbon::now()]);
  }

  public function guestexit($id)
  {
    $affected = DB::table('guest_lists')
      ->where('id', $id)
      ->update(['cixis' => Carbon::now()]);
  }
}