<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reaction;
use App\Adjustment;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjustments = Adjustment::all();

        $return = [];

        foreach($adjustments as $adjustment) {
            $return[$adjustment->id] = [];
            $return[$adjustment->id]['adjustment_id'] = $adjustment->id;

            foreach ($adjustment->reactions as $reaction) {
                $return[$adjustment->id]['data'][] = $reaction;

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
        $reaction = new Reaction();
        $reaction->description = $request->get('reaction');
        $reaction->user_id = auth()->user()->id;
        $reaction->save();

        $adjustment = Adjustment::findOrFail($request->get('adjustment'));
        $adjustment->reactions()->attach($reaction->id);

        return response()->json(['success' => 'Reaction added successfully!'], 200);
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
