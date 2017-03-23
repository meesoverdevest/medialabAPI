<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adjustment;
use App\Neighbourhood;

class AdjustmentsController extends Controller
{
  public function index()
  {
  	$adjustments = Adjustment::paginate(10);
  	return view('adjustments.index', compact('adjustments'));
  }

  public function create()
  {
  	$hoods = Neighbourhood::pluck('title', 'id');
  	return view('adjustments.create', compact('hoods'));	
  }

  public function show($id)
  {
  	$adjustment = Adjustment::findOrFail($id);
  	return view('adjustment.show', compact('adjustment'));
  }

  public function store(Request $request)
  {
  	$adjustment = new Adjustment();
  	$adjustment->title = $request->get('title');
  	$adjustment->description = $request->get('description');
  	$adjustment->neighbourhood_id = $request->get('neighbourhood');
  	$adjustment->save();

  	return redirect()->route('adjustments.addMarker', $adjustment->id)->with('Success', 'De wijziging is succesvol toegevoegd');
  }

  public function addMarker($id)
  {
  	$adjustment = Adjustment::findOrFail($id);
  	return view('adjustments.addMarker', compact('adjustment'));
  }

  public function addMarkerPost(Request $request, $id)
  {
  	$adjustment = Adjustment::findOrFail($id);
  	$adjustment->google_id = $request->get('places_id');
  	$adjustment->save();

  	return redirect()->route('adjustments.index')->with('Success', 'Een locatie is toegevoegd aan wijziging: ' . $adjustment->title);
  }

  public function update(Request $request, $id)
  {

  }

  public function destroy(Request $request)
  {

  }
}
