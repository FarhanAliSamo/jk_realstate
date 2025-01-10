<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EditorUploads;
use App\Models\BlogArticles;
use App\Models\BasicDetails;

class BlogController extends Controller
{
    //

    public function index()
    {
        
    	$page_title = "Blogs";
        $data['blogs'] = BlogArticles::get();
        $basic_details = BasicDetails::where('id','1')->first();
    	return view('admin.blog.index',compact('data','page_title','basic_details'));
    }
    
    
    public function add(Request $request)
    {
    	$page_title = "Blog - Add";
    	$basic_details = BasicDetails::where('id','1')->first();
        return view('admin.blog.add',compact('page_title','basic_details'));
    }
    
     public function delete(Request $request){
        
        $blog_article = BlogArticles::where('id',$request->id)->delete();
        
        return redirect()->to(route('admin.blog.index'))->with(['success' => 'Blog Deleted Successfully!']);
    }
    
    public function store(Request $request)
    {
        $page_title = "Blogs";
        $request->merge(['slug'=>str_slug($request->title)]);
        $rules = [
            'title' => 'required|max:150',
            'content' => 'required',
            'slug' => 'unique:blog_articles,slug',
        ];
        
        $customMessages = [
            'slug.unique' => 'There already exist a similar article with this title, please make it unique',
        ];

        $this->validate($request, $rules, $customMessages);
        $article = new BlogArticles();
        $before = $article->toArray();
	    $article->title = $request->title;
	    $article->content = $request->content;
	    $article->meta_title = $request->meta_title;
        $article->meta_description = $request->meta_description;
        $article->is_index = $request->is_index;
	    $article->slug = $request->slug;
        if($request->file('featured_image') != null){
            $article->featured_image = $this->upload_featured_image($request);
        }	
        
        if($request->featured != ''){
            $article->featured = $request->featured;
        }else{
            $article->featured = 0;
        }
        
	    $article->save();
	    
	    $after = $article->toArray();
        
        createHistory('blogs_articles_save',$article->id,$before,$after);
	   
	    return redirect()->route('admin.blog.index')->with('succes','Blog added successfuly!');
    
    }      
    
    public function edit(Request $request,$id)
    {
    	$page_title = "Blog - Edit";
    	$data['blog'] = BlogArticles::where('id',$id)->first();
    	if($data['blog'])
    	{
            $basic_details = BasicDetails::where('id','1')->first();
        	return view('admin.blog.edit',compact('data','page_title','basic_details'));    	    
    	}
    	
		return redirect()->route('admin.blog.index')->with('error','Page not found');

    }
    
     public function update(Request $request,$id)
    {
        $page_title = "Blogs";
        
        $article = BlogArticles::where('id',$id)->first();
        $before = $article->toArray();
        if($article)
        {
    	    $article->title = $request->title;
    	    $article->content = $request->content;
    	            
            $article->meta_title = $request->meta_title;
            $article->meta_description = $request->meta_description;
            
            $article->is_index = $request->is_index;

            if($request->file('featured_image') != null){
                $article->featured_image = $this->upload_featured_image($request);
            }    	
            
            if($request->featured != ''){
            $article->featured = $request->featured;
            }else{
                $article->featured = 0;
            }
        
        
    	    $article->save();
    	    
    	    $after = $article->toArray();
            createHistory('blogs_articles_update',$article->id,$before,$after);
            
    	    return redirect()->route('admin.blog.index')->with('succes','Information Updated Successfully!');
        }
    	

    	return redirect()->route('admin.blog.index')->with('error','Blog not found');
    }      
    
    
    function mce_upload_image(Request $request){

        $file = $request->file('file');

        if($file->getMimeType() == 'video/mp4'){
            $rules = [
                'file' => 'mimes:mp4|max:51200',
            ];

            $customMessages = [
                'file.max' => 'Max upload size is 50 MB (Video is bigger than 50 MB).',
            ];

            $this->validate($request, $rules, $customMessages);

            $d = public_path("uploads/videos/");
            $file_name = get_clean_microtimestamp_string()."-".mt_rand(0,9999);
            $ext = $file->extension();

            $file->move($d, $file_name.".".$ext);

            $editor_upload = new EditorUploads();
            $editor_upload->user_id = \Auth::user()->id;
            $editor_upload->file_path = "/uploads/videos/".$file_name.".".$ext;
            $editor_upload->file_size = @filesize("uploads/videos/".$file_name.".".$ext); // save size in bytes
            $editor_upload->save();

            return "/uploads/videos/".$file_name.".".$ext; 
        }else{
            $rules = [
                'file' => 'image|max:1024',
            ];

            $customMessages = [
                'file.max' => 'Max upload size is 1024 KB (Image is bigger than 1024 KB).',
            ];

            $this->validate($request, $rules, $customMessages);


            $image = $request->file('file');

            $d = public_path("uploads/images/mce_uploads/");
            $t = get_clean_microtimestamp_string()."-".mt_rand(0,9999);
            $file_name = $d.$t;
            $ext = $image->extension();

            $image = $request->file('file');
            $img = \Image::make($image);

            //save original
            $img = $img->save($file_name.".".$ext,80);

            $editor_upload = new EditorUploads();
            $editor_upload->user_id = \Auth::user()->id;
            $editor_upload->file_path = "/uploads/images/mce_uploads/".$t.".".$ext;
            $editor_upload->file_size = $file->getSize(); //save size in bytes
            $editor_upload->save();

            return "/uploads/images/mce_uploads/".$t.".".$ext;
        }
    }

    function upload_featured_image($request){
        $d = public_path("uploads/images/blogs/");

        $image = $request->file('featured_image');
        $t = get_clean_microtimestamp_string();

        $name = $request->title;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_500 = $d.$t.'-'.str_slug($img_title)."_500";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,60);

        //save _700
        $img->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_500.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    } 

}
