<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
  	public function register(Request $request) {
  		return $request;
  	}

  	public function test(Request $request) {
  		return "test";
  	}
}
