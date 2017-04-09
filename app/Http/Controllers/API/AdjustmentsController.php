<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adjustment;

class AdjustmentsController extends Controller
{
    public function index(){
    	$adjustments = Adjustment::all();

    	return response()->json($adjustments, 200);
    }

	  public function create()
	  {
	  	
	  }

	  public function show($id)
	  {
	  	$adjustment = Adjustment::findOrFail($id);
	  	return response()->json($adjustment, 200);
	  }

	  public function store(Request $request)
	  {
	  	
	  }

	  public function update(Request $request, $id)
	  {

	  }

	  public function destroy(Request $request)
	  {

	  }
}
