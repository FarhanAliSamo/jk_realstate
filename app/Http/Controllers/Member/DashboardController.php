<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    
    public function index(){
        
        $page_title = "Member | dashboard";
        
        return view('member.dashboard',compact('page_title'));
    }
}
