<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterController extends Controller
{
    //
    
    public function register(){
        
        if(auth()->check()){
            return redirect()->to(route('member.dashboard'));
        }
        
        
        $page_title = "Register";
        
        return view('member.register',compact('page_title'));
    }
    
    public function signup(Request $request){
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect("login")->with(['status',"Registered Successfully"]);
    }
}
