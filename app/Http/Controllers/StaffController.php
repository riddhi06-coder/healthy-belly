<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StaffController extends Controller
{
    public function staffmember_dashboard(){
    	if(isset(Auth::guard('staffmember')->user()->id)){
    		return view('staffmember');	
    	}else{
    		return redirect()->route('staffmember_login');
    	}
        
    }
}
