<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json([$user], 200);
    }

    public function isBanned()
    {
        $banUser = User::select('users.*')->where('is_banned', 1)->get();
        return response()->json([$banUser], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = $request->role;

        $result = DB::update('update roles set role = ? where user_id = ?', [$role, $user->id]);

        if (!$result) {
            return response()->json(["Couldn't update"], 400);
        } else {
            return response()->json(['Update Succefuly'], 205);
        }
    }

    public function banUsers(Request $request, $id)
    {
        $userIsBanned = $request->is_banned;
        $user = User::findOrFail($id);
        $user->is_banned = $userIsBanned;
        $user->save();

        return response()->json([$user], 200);
    }
}
