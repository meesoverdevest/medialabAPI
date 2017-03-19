<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
  	public function register(Request $request) {

			$user = User::create([
	        'name' => $request->get('name'),
	        'email' => $request->get('mail'),
	        'password' => bcrypt($request->get('pass')),
	    ]);

	    $user->api_token = str_random(60);
	    $user->save();

  		return response()->json(
  			['token' => $user->api_token,
  			'name' => $user->name,
  			'mail' => $user->email],
  			200
			);
  	}

  	public function test(Request $request) {
  		$name = "adfsd";

  		return response()->json(['name' => $name], 200);
  	}

  	public function protectedTest() {
  		return response()->json(['name' => 'authenticated'], 200);
  	}
}
