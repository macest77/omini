<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function getRegister()
	{
		return view('auth.register');
	}

    public function register(Request $request)
    {

    }
}
