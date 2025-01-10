<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products;
use App\Models\ProductDetails;
use App\Models\ProductImages;
use App\Models\ProductAttributes;
use App\Models\Industry;
use App\Models\EditorUploads;
use App\Models\CompanyProfiles;
use App\Models\BasicDetails;
use App\Models\BlogMessage;

use Response;

class BlogCommentsController extends Controller
{
    //
    public function index(){
        $page_title = "Blogs Comments";
        $blogscomments = BlogMessage::orderBy('id','DESC')->get();
        $basic_details = BasicDetails::where('id','1')->first();
    	return view('admin.blogcomments.index',compact('blogscomments','page_title','basic_details'));
    }


    public function delete(Request $request){
        
        $blogscomments = BlogMessage::where('id',$request->id)->delete();
        
        return redirect()->to(route('admin.blogcomments.index'))->with(['success' => 'Comments Deleted Successfully!']);
    }

    public function updateInfo(Request $request)
    {
        $commentInfo = BlogMessage::find($request->id);
       
        if($commentInfo)
        {
            $commentInfo->is_approved = intval($request->value);
            $commentInfo->save();
        }

		return Response::json([
			'status'	=>  1,
			'message'	=>  'Information Updated',
        ],200);        
    }
    
    public function edit(Request $request,$id)
    {
    	$page_title = "blogcomments - Edit";
    	$data['blogcomments'] = BlogMessage::where('id',$id)->first();
    	if($data['blogcomments'])
    	{
            $basic_details = BasicDetails::where('id','1')->first();
        	return view('admin.blogcomments.edit',compact('blogcomments','page_title','basic_details','data'));    	    
    	}
    	
		return redirect()->route('admin.blogcomments.index')->with('error','Page not found');

    }
    
    

   public function update(Request $request,$id)
    {
        
        $page_title = "blogcomments";
        
        $article = BlogMessage::where('id',$id)->first();
        if($article)
        {
    	    $article->bname = $request->bname;
    	    $article->bemail = $request->bemail;
    	    $article->bphone = $request->bphone;
    	    $article->bmessage = $request->bmessage;
    	    $article->save();
    	    return redirect()->route('admin.blogcomments.index')->with('succes','Information Updated Successfully!');
        }
    	
    	return redirect()->route('admin.blogcomments.index')->with('error','Page not found');
    }      
    
        
}