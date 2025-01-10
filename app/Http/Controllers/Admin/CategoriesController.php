<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EditorUploads;
use App\Models\Industry;
use App\Models\BasicDetails;

class CategoriesController extends Controller
{
    //
    public function index(){

    	$categories = Industry::simplePaginate(10);
    	$page_title = "Categories List";

    	$industry_arr = Industry::pluck('name','id')->toArray();
        $basic_details = BasicDetails::where('id','1')->first();

    	return view('admin.categories.index',compact('categories','industry_arr','basic_details','page_title'));
    }

    public function add(){
    	$page_title = "Categories | Add";

    	$parent_ids_arr = Industry::pluck('name','id')->toArray();
    	$parent_ids_arr = merge_select($parent_ids_arr,"Select Parent");
        $basic_details = BasicDetails::where('id','1')->first();

    	return view('admin.categories.add',compact('page_title','basic_details','parent_ids_arr'));
    }
    
       public function delete($id){
            $page_title = "";
            
            Industry::where('id',$id)->delete();
            
            
            return redirect()->to(route('admin.categories.index'))->with(['success' => 'Category Deleted Successfully!']);
        }

    public function edit($id){
        $page_title = "Categories | Edit";

        $parent_ids_arr = Industry::pluck('name','id')->toArray();
        $parent_ids_arr = merge_select($parent_ids_arr,"Select Parent");

        $category = Industry::where('id',$id)->first();
        $basic_details = BasicDetails::where('id','1')->first();

        return view('admin.categories.edit',compact('page_title','category','basic_details','parent_ids_arr'));
    }

    public function update(Request $request,$id){
        $industry = Industry::where('id',$id)->first();

        if(!$industry){
            abort('404');
        }
        
        $before = $industry->toArray();

         if(intval($request->parent_id) > 0){
            $industry->parent_id = $request->parent_id;
            $industry->have_childs = 1;
        }
        
        if(intval($request->parent_id) == 0){
            $industry->parent_id = 0;
            $industry->have_childs = 0;
        }

        $industry->name = $request->name;
        $industry->slug = str_slug($request->name);
        
        
        $industry->meta_title = $request->meta_title;
        $industry->meta_description = $request->meta_description;
        $industry->is_index = $request->is_index;
        $industry->seo_content = $request->seo_content;
        $industry->short_description = $request->short_description;
        
        if($request->file('featured_image') != null){
            $industry->featured_image = $this->upload_featured_image($request);
        }
        
        if($request->file('f_icon') != null){
            $industry->f_icon = $this->upload_f_icon($request);
        }
        
        if($request->file('featured_banner') != null){
            $industry->featured_banner = $this->upload_featured_banner($request);
        }
        
        if($request->fea_cat != ''){
            $industry->fea_cat = $request->fea_cat;
            }else{
                $industry->fea_cat = 0;
            }
            
            if($request->f_industries != ''){
            $industry->f_industries = $request->f_industries;
            }else{
                $industry->f_industries = 0;
            }
            
             if($request->center_cat != ''){
            $industry->center_cat = $request->center_cat;
            }else{
                $industry->center_cat = 0;
            }
            
            if($request->have_childs != ''){
            $industry->have_childs = $request->have_childs;
            }else{
                $industry->have_childs = 0;
            }

        $industry->save();
        
        $after = $industry->toArray();
        
        createHistory('industry_update',$industry->id,$before,$after);

        return redirect()->to('/admin/categories')->with(['success' => 'Category updated SuccessFully!']);
    }
    
    
    
    function _validate_request($request){

        
            $rules = [
                'name'  => 'required|max:100',
                'slug' => 'unique:industries,slug'
            ];
        

        $customMessages = [
            'slug' => 'Industry Already Exists',
            'name.max' => 'Name Less Then 100'
        ];

        $this->validate($request, $rules, $customMessages);
    }

    public function save(Request $request){
        
        
        
        // $this->_validate_request($request);
        
      
        $industry = new Industry();

        $before = $industry->toArray();
        
        if(intval($request->parent_id) > 0){
            $industry->parent_id = $request->parent_id;
            $industry->have_childs = 1;
        }
        
        if(intval($request->parent_id) == 0){
            $industry->parent_id = 0;
            $industry->have_childs = 0;
        }

        $industry->name = $request->name;
        $industry->slug = str_slug($request->name);
        
        $industry->meta_title = $request->meta_title;
        $industry->meta_description = $request->meta_description;
        $industry->is_index = $request->is_index;
        $industry->seo_content = $request->seo_content;
        $industry->short_description = $request->short_description;
        
        
        
        if($request->file('featured_image') != null){
            $industry->featured_image = $this->upload_featured_image($request);
        }
        
         if($request->file('f_icon') != null){
            $industry->f_icon = $this->upload_f_icon($request);
        }
        
          if($request->file('featured_banner') != null){
            $industry->featured_banner = $this->upload_featured_banner($request);
        }
        
        
        if($request->fea_cat != ''){
            $industry->fea_cat = $request->fea_cat;
            }else{
                $industry->fea_cat = 0;
            }
            
            if($request->f_industries != ''){
            $industry->f_industries = $request->f_industries;
            }else{
                $industry->f_industries = 0;
            }
            
             if($request->center_cat != ''){
            $industry->center_cat = $request->center_cat;
            }else{
                $industry->center_cat = 0;
            }
            
            if($request->have_childs != ''){
            $industry->have_childs = $request->have_childs;
            }else{
                $industry->have_childs = 0;
            }
        
        
         $industry->save();
        
         $after = $industry->toArray();
        
        createHistory('industry_store',$industry->id,$before,$after);

        return redirect()->to('/admin/categories')->with(['success' => 'Category Added SuccessFully!']);
    }



function upload_featured_banner($request){
        $d = public_path("uploads/images/categories/");

        $image = $request->file('featured_banner');
        $t = get_clean_microtimestamp_string();

        $name = $request->name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_200 = $d.$t.'-'.str_slug($img_title)."_200";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _700
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_200.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    }
    
    
    
    function upload_featured_image($request){
        $d = public_path("uploads/images/categories/");

        $image = $request->file('featured_image');
        $t = get_clean_microtimestamp_string();

        $name = $request->name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_200 = $d.$t.'-'.str_slug($img_title)."_200";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _700
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_200.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    }
    
    
    
    function upload_f_icon($request){
        $d = public_path("uploads/images/categories/");

        $image = $request->file('f_icon');
        $t = get_clean_microtimestamp_string();

        $name = $request->name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_200 = $d.$t.'-'.str_slug($img_title)."_200";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _700
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_200.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
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

}