<?php

namespace App\Http\Controllers;

use App\Models\PartyUser;
use Illuminate\Http\Request;

class PartyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idUser = $request->user()->id;
        $idParty = $request->party_id;
        $data = ['user_id' => $idUser, 'party_id' => $idParty];
        PartyUser::create($data);

        return $data;
        response()->json(['Te has unido al grupo'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idUser = $request->user()->id;
        $idParty = $request->party_id;
        $id = PartyUser::where('user_id', $idUser)->where('party_id', $idParty)->first()->delete();

        return $id;
        response()->json(['Usuario Dado de baja de la sala'], 200);
    }
}
