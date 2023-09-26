<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuestList;
use Illuminate\Support\Str;

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

    return view('intranet.guest_list');
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
      3 => 'email',
      4 => 'email_verified_at',
    ];

    $search = [];

    $totalData = GuestList::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    // $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $users = GuestList::offset($start)
        ->limit($limit)
        // ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $users = GuestList::where('fullname', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        // ->orderBy($order, $dir)
        ->get();

      $totalFiltered = User::where('fullname', 'LIKE', "%{$search}%")->count();
    }

    $data = [];

    if (!empty($users)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($users as $user) {
        $nestedData['id'] = $user->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['name'] = $user->fullname;
        $nestedData['email'] = $user->purpose;
        $nestedData['email_verified_at'] = $user->status;

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
          'division' => $request->divison,
          'nomre' => $request->phone,
          'emekdas' => $request->emekdas,
        ]
      );

      // user updated
      return response()->json('dəyişdirildi.');
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

    $users = GuestList::where($where)->first();

    return response()->json($users);
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