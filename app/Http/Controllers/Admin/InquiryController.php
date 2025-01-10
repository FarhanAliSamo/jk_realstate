<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EditorUploads;
use App\Models\Inquiry;
use App\Models\BasicDetails;

class InquiryController extends Controller
{
    //

    public function index()
    {
        
    	$page_title = "Inquiry";
        $inquiry = Inquiry::get();
        $basic_details = BasicDetails::where('id','1')->first();
    	return view('admin.inquiries.index',compact('inquiry','page_title','basic_details'));
    }
    
    
     public function delete(Request $request){
        
        $blog_article = Inquiry::where('id',$request->id)->delete();
        
        return redirect()->to(route('admin.inquiries.index'))->with(['success' => 'Inquiry Deleted Successfully!']);
    }
    

 
}
