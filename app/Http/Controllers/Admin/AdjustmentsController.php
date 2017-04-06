<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adjustment;
use App\Neighbourhood;
use App\Helpers\QRGenerator;

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
  	return view('adjustments.show', compact('adjustment'));
  }

  public function store(Request $request)
  {
  	$adjustment = new Adjustment();
  	$adjustment->title = $request->get('title');
  	$adjustment->description = $request->get('description');
  	$adjustment->neighbourhood_id = $request->get('neighbourhood');
  	$adjustment->save();

    $qr = new QRGenerator($adjustment);
    if($qr->generateQR() == false) {
      return redirect()->back()->with('Error', 'QR could not be created');
    }

  	return redirect()->route('admin.adjustments.addMarker', $adjustment->id)->with('Success', 'De wijziging is succesvol toegevoegd');
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
    $adjustment->lat = $request->get('lat');
    $adjustment->lon = $request->get('lon');
  	$adjustment->save();

  	return redirect()->route('admin.adjustments.index')->with('Success', 'Een locatie is toegevoegd aan wijziging: ' . $adjustment->title);
  }

  public function updateMarker($id)
  {
    $adjustment = Adjustment::findOrFail($id);
    return view('adjustments.updateMarker', compact('adjustment'));
  }

  public function updateMarkerPost(Request $request, $id)
  {
    $adjustment = Adjustment::findOrFail($id);
    $adjustment->google_id = $request->get('places_id');
    $adjustment->lat = $request->get('lat');
    $adjustment->lon = $request->get('lon');
    $adjustment->save();

    return redirect()->route('admin.adjustments.index')->with('Success', 'De locatie van wijziging: ' . $adjustment->title . ' is succesvol geüpdatet!');
  }

  public function edit($id)
  {
    $adjustment = Adjustment::findOrFail($id);
    return view('adjustments.edit', compact('adjustment'));
  }

  public function update(Request $request, $id)
  {
    $adjustment = new Adjustment();
    $adjustment->title = $request->get('title');
    $adjustment->description = $request->get('description');
    $adjustment->neighbourhood_id = $request->get('neighbourhood');
    $adjustment->save();

    return redirect()->route('admin.adjustments.index', $adjustment->id)->with('Info', 'De wijziging is succesvol aangepast');
  }

  public function destroy(Request $request)
  {

  }
}
