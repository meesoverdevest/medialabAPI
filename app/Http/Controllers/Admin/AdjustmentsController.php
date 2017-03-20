<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdjustmentsController extends Controller
{
  public function index()
  {
  	$adjustments = Adjustment::paginate(10);
  	return view('adjustments.index', compact('adjustments'));
  }

  public function create()
  {
  	return view('adjustments.create');	
  }
}
