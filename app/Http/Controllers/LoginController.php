<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request){

    	if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

			$user = Auth::user();

			return redirect('dashboard')->with('message', ['success','Welcome '.$user->name]);
			
		}else{
			return redirect('/login')->with('message', ['error', 'User not found']);	
		}

    }
}
