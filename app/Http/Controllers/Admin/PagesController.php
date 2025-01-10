<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MetaTags;
use App\Models\BasicDetails;

class PagesController extends Controller
{
    //
    public function index()
    {
        
    	$page_title = "Pages List";
        $data['seo_content'] = MetaTags::get();
        $basic_details = BasicDetails::where('id','1')->first();
    	return view('admin.pages.index',compact('data','page_title','basic_details'));
    }
    
    public function edit(Request $request,$page)
    {
    	$page_title = "Pages Edit";
    	$data['meta'] = MetaTags::where('page',$page)->first();
    	if($data['meta'])
    	{
            $basic_details = BasicDetails::where('id','1')->first();
        	return view('admin.pages.edit',compact('data','page_title','basic_details'));    	    
    	}
    	
		return redirect()->route('admin.pages.index')->with('error','Page not found');

    }
    
    public function update(Request $request,$page)
    {
        $page_title = "Pages List";
        
    	$data['meta'] = MetaTags::where('page',$page)->first();
    	if($data['meta'])
    	{
        	$before = $data['meta']->toArray();
    	    $data['meta']->title = $request->title;
    	    $data['meta']->description = $request->description;
    	    $data['meta']->keyword = $request->keyword;
    	    $data['meta']->content = $request->content;
    	    $data['meta']->page_schema = $request->page_schema;
    	    $data['meta']->save();
    	    $after = $data['meta']->toArray();
            createHistory('page_meta_update',$data['meta']->id,$before,$after);
    	    return redirect()->route('admin.pages.index')->with('succes','Information Updated Successfully!');
    	}
    	
    	

    	return redirect()->route('admin.pages.index')->with('error','Page not found');
    }    
}
