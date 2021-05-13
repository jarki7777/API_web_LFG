<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
        $partyId = $request->party_id;
        $userId = $request->user()->id;
        $message = $request->message;

        $message = [
            'message' => $message,
            'party_id' => $partyId,
            'user_id' => $userId
        ];

        Message::create($message);

        return response()->json(['data' => $message], 201);
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
        $userId = $request->user()->id;

        $message = Message::findOrFail($id);

        $update = Message::where('user_id', $userId)->where('id', $id)->first();

        if (!$update) {

            return response()->json(["Couldn't update"], 400);
            
        }

        if ($request->has('message')) {
            $message->message = $request->message;
        }

        $message->save();

        return response()->json(['data' => $message], 205);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $userId = $request->user()->id;

        $delete = Message::where('user_id', $userId)->where('id', $id)->delete();

        if (!$delete) {
            
            return response()->json(["Couldn't delete"], 400);
            
        } 

        return response()->json(['Deleted successfully'], 200);
    }
}
