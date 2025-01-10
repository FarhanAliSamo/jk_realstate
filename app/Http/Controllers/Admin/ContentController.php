<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SeoContent;
use App\Models\BasicDetails;

class ContentController extends Controller
{
    //
    public function homepage_content(){

    	$page_title = "Add Content";

    	$seo_content = SeoContent::all()->keyBy('key')->toArray();
        $basic_details = BasicDetails::where('id','1')->first();

    	return view('admin.content.add',compact('page_title','seo_content','basic_details'));
    }

    public function aboutus_content(){

        $page_title = "Add Content";

        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        $basic_details = BasicDetails::where('id','1')->first();

        return view('admin.content.about_us',compact('page_title','seo_content','basic_details'));
    }


    public function save_content(Request $request){
    	
    	foreach ($request->content as $key => $value) {

            $seo_content = SeoContent::where('key',$key)->first();
            
            $before = $seo_content->toArray();

            if(!$seo_content){
	    	  $seo_content = new SeoContent();
            }

            if($key != str_replace('_image', '', $key) ){
                $seo_content->content = $this->upload_company_logo($value);
            }else{
                $seo_content->content = $value;
            }

	    	$seo_content->key = $key;
	    	$seo_content->save();
	    	
	    	$after = $seo_content->toArray();
        
            createHistory('seo_content',$seo_content->id,$before,$after);

    	}

    	return redirect()->back()->with(['success' => 'Content Updated Successfully!']);
    }



    function upload_company_logo($request){
        $d = public_path("uploads/images/");

        $image = $request;

        $t = get_clean_microtimestamp_string();

        $name = auth()->user('admin')->company_name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_500 = $d.$t.'-'.str_slug($img_title)."_500";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _700
        $img->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_500.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    }
}
