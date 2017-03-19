<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
  	public function register(Request $request) {
  		// User::create([
	   //      'name' => $data['name'],
	   //      'email' => $data['email'],
	   //      'password' => bcrypt($data['password']),
	   //      'api_token' => str_random(60),
	   //  ]);

  		$name = $request->get('name');

  		return response()->json(compact('name'));
  	}

  	public function test(Request $request) {
  		$name = "adfsd";

  		return response()->json(['name' => $name], 200);
  	}
}
