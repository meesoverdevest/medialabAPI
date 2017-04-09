<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vote;
use App\Reaction;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reactions = Reaction::all();

        $return = [];

        foreach($reactions as $reaction) {
            $return[$reaction->id] = [];

            foreach ($reaction->votes as $vote) {
                $return[$reaction->id][] = $vote;
            }
        }

        return response()->json($return, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $answer = false;

        if($request->get('vote') == "true"){
            $answer = true;
        }


        $vote = new Vote();
        $vote->vote = $answer;
        $vote->user_id = auth()->user()->id;
        $vote->reaction_id = $request->get('reaction');
        $vote->save();

        return response()->json($reaction, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reaction = Reaction::with('votes')->findOrFail($id);

        return response()->json($reaction, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id)
    {
        //
    }
}
