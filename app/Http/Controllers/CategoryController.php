<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\support\Facades\redirect;


class CategoryController extends Controller
{
  public function admin_auth_cehck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            return;
        }
        else
        {
            return redirect::to('/admin')->send();
        }
    }

    public function index()
    {
        $this->admin_auth_cehck();
    	return view('admin.add_category');	
    }

    public function all_category()
    {
        $this->admin_auth_cehck();
        $all_category_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.all_category')->with('all_category_info',$all_category_info);
    	return view('admin_layout')->with('admin.all_category',$manage_category);
    }

    public function save_category(Request $request)
    {//$this->admin_auth_cehck();
    	$data=array();

    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status;
    	$res=DB::table('tbl_category')->insert($data);
    	if($res)
    	{
    		Session::put('messeges','Data added Successfully');
    		return redirect::to('/add-category');
    	}

    	else
    	{
    		Session::put('messeges','Something is wrong');
    	}
    }

    public function unactive($category_id)
    {

        DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>0]);
        Session::put('messeges','Category Unactive Successfully');
        return redirect::to('/all_category');
    }

    public function active($category_id)
    {
        DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>1]);
        Session::put('messeges','Categroy Activated Successfully');
        return redirect::to('/all_category');
    }
    public function edit_category($category_id)
    {
        $info=DB::table('tbl_category')->where('category_id',$category_id)->first();
        $category_info=view('admin.edit_category')->with('category_information',$info);
        return view('admin_layout')->with('admin.edit_category',$category_info);
      // return view('admin.edit_category');
    }
    public function update_category(Request $request,$category_id)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        DB::table('tbl_category')->where('category_id',$category_id)->update($data);
        Session::get('messeges','You update the column righ now');
        return redirect::to('/all_category');
    }
    public function delete_category($category_id)
    {
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::get('messeges','Deleted_Successfully');
        return redirect::to('/all_category');
    }
}
