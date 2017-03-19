<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function login(Request $request) {

		$user = User::where('name',$request->get('name'))->where('email', $request->get('mail'))->firstOrFail();
        
    $user->api_token = str_random(60);
    $user->save();

		return response()->json(
			['token' => $user->api_token,
			'name' => $user->name,
			'mail' => $user->email],
			200
		);
	}
}
