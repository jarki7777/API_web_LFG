<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\PartyUser;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $party = Party::select('parties.*', 'games.name as game_name')->join('games', 'parties.game_id', 'games.id')->get();
        return $party;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $party = Party::create($data);

        return $party;
        response()->json([$data => $party], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $name)
    {
        $idGame =  $request->game_id;
        $party = Party::where('game_id',  $idGame)->first();
        return $party;
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        PartyUser::where('party_id', $id)->delete();
        $result = Party::destroy($id);


        if (!$result) {
            return response()->json(['La Party no ha sido encontrada'], 400);
        }

        return response()->json(['Party borrada con exito'], 200);
    }
}
