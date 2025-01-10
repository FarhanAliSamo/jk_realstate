<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Redirection;
use App\Models\BasicDetails;

class RedirectionsController  extends Controller
{
    //

    public function index()
    {
        
    	$page_title = "Redirections";
        $data['redirections'] = Redirection::get();
        $basic_details = BasicDetails::where('id','1')->first();
    	return view('admin.redirection.index',compact('data','page_title','basic_details'));
    }
    
    
    public function add(Request $request)
    {
    	$page_title = "Redirections - Add";
    	$basic_details = BasicDetails::where('id','1')->first();
        return view('admin.redirection.add',compact('page_title','basic_details'));
    }
    
    public function store(Request $request)
    {
        $page_title = "Redirections";
        
        $rules = [
            'url' => 'required|max:300',
            'redirection_url' => 'required|max:300',
            'redirection_status' => 'required',
        ];
        
        $customMessages = [
            
        ];

        $this->validate($request, $rules, $customMessages);
        $redirectionInfo = new Redirection();
	    $redirectionInfo->url = $request->url;
	    $redirectionInfo->redirection_url = $request->redirection_url;
	    $redirectionInfo->redirection_status = $request->redirection_status;
	    $redirectionInfo->status = intval($request->status);
	    $redirectionInfo->save();
	   
	    return redirect()->route('admin.redirection.index')->with('succes','Redirection added successfuly!');
    
    }      
    
    public function edit(Request $request,$id)
    {
    	$page_title = "Redirections - Edit";
    	$data['redirection'] = Redirection::where('id',$id)->first();
    	if($data['redirection'])
    	{
            $basic_details = BasicDetails::where('id','1')->first();
        	return view('admin.redirection.edit',compact('data','page_title','basic_details'));    	    
    	}
    	
		return redirect()->route('admin.redirection.index')->with('error','Page not found');

    }
    
    public function update(Request $request,$id)
    {
        $page_title = "Redirections";
        
        $redirectionInfo = Redirection::where('id',$id)->first();
        if($redirectionInfo)
        {
    	    $redirectionInfo->url = $request->url;
    	    $redirectionInfo->redirection_url = $request->redirection_url;
    	    $redirectionInfo->redirection_status = $request->redirection_status;
    	    $redirectionInfo->status = intval($request->status);
    	    $redirectionInfo->save();
    	    return redirect()->route('admin.redirection.index')->with('succes','Information Updated Successfully!');
        }
    	

    	return redirect()->route('admin.redirection.index')->with('error','Blog not found');
    }      
}
