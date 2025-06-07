<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function admin_dashboard(){
    	if(isset(Auth::guard('admin')->user()->id)){
    		return view('admin.dashboard');	
    	}else{
    		return redirect()->route('admin_login');
    	}
        
    }
}
