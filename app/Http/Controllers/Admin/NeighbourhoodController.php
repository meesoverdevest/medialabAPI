<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Neighbourhood;

class NeighbourhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoods = Neighbourhood::paginate(20);
        return view('neighbourhoods.index', compact('hoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('neighbourhoods.create');
    }

    public function show($id)
    {
        $hood = Neighbourhood::findOrFail($id);
        return view('neighbourhoods.show', compact('hood'));
    }

    public function store(Request $request)
    {
        $hood = new Neighbourhood();
        $hood->title = $request->get('title');
        $hood->description = $request->get('description');
        $hood->google_id = "";
        $hood->save();

        return redirect()->route('admin.neighbourhoods.index')->with('Success', 'De wijk is succesvol toegevoegd');
    }

    public function edit($id)
    {
        $hood = Neighbourhood::findOrFail($id);
        return view('neighbourhoods.edit', compact('hood'));
    }

    public function update(Request $request, $id)
    {
        $hood = Neighbourhood::findOrFail($id);
        $hood->title = $request->get('title');
        $hood->description = $request->get('description');
        $hood->save();

        return redirect()->route('admin.neighbourhoods.index')->with('Info', 'De wijk is succesvol aangepast');
    }

    public function destroy(Request $request)
    {

    }
}
