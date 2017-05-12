<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
	public function index(Request $request){
		
		//$request->session()->put("Test", "Meh");
		//$request->session()->forget("Test");
		//echo $request->session()->get("Test");
		
		return view('login.index');
	}
	
	public function doLogin(Request $request){
		
		return view(/);
	}
}
