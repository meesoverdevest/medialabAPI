<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class LoginController extends Controller
{
	public function login(Request $request) {
		$request = $request->all();

		$user = User::where('email', $request['mail'])->first();

		$validCredentials = Hash::check($request['pass'], $user->getAuthPassword());


		if ($validCredentials) {
			$user->api_token = str_random(60);
	    $user->save();

	    return response()->json(
				['token' => $user->api_token,
				'name' => $user->name,
				'mail' => $user->email],
				201
			);
		} else {
			return response()->json(
				['error' => 'Credentials do not match'],
				400);
		}
		// Auth::attempt(['email' => $request->get('mail'), 'password' => $request->get('pass')]);
	}
}
