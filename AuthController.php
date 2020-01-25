<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Request,Hash;

class AuthController extends Controller
{
    
    function login(){
    	return view('/login', []);
    }

    public function submitLogin(){
		$auth = auth()->guard('admin');	
		if( $auth->attempt( Request::only( 'v_name', 'password' ), ( Request::get('remember_checkbox') ? true : false ) ) ){

		return redirect('index')->with('success',trans('auth.sccessfullylogin'));			
		}		
		return redirect('login')->with('error',trans('auth.failed'));
	}
}