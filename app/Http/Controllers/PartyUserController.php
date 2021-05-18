<?php

namespace App\Http\Controllers;

use App\Models\PartyUser;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PartyUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $idUser = $request->user()->id;
            $idParty = $request->party_id;
            $data = ['user_id' => $idUser, 'party_id' => $idParty];
            PartyUser::create($data);

            return response()->json(['message' => 'You have joined'], 202);
        } catch (QueryException $error) {

            return response()->json(['message' => 'You have already joined'], 422);
        } catch (\Exception $error) {

            return response()->json(['message' => 'An error has occurred'], 503);
        }
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

        return response()->json(['message' => 'You have given up the party'], 200);
    }
}
