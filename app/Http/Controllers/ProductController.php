<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\support\Facades\redirect;


class ProductController extends Controller
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


    public function add_product()
    {
        $this->admin_auth_cehck();
    	return view('admin.add_product');
    }

    public function all_product()
    {
        $this->admin_auth_cehck();
    	$info=DB::table('tbl_products')
    	->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    	->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    	->select('tbl_products.*','tbl_manufacture.manufacture_name','tbl_category.category_name')
    	->get();

        // echo "<pre>";
        // print_r($info);
        // echo "</pre>";
        // exit();
      	$manage=view('admin.all_product')->with('info',$info);
    	return view('admin_layout')->with('admin.all_product',$manage);
    }

    public function active($product_id)
    {
    	DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>1]);
    	Session::put('messeges','Active Successfully');
    	return redirect::to('/all_product');
    }

    public function unactive($product_id)
    {
    	DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>0]);
    	Session::put('messeges','Unactive Successfully');
    	return redirect::to('/all_product');
    }

    public function delete_product($id)
    {
    	DB::table('tbl_products')->where('product_id',$id)->delete();
    	Session::put('messeges','Deleted_Successfully');
    	return redirect::to('/all_product');
    }

    public function edit_product($product_id)
    {
    	$info=DB::table('tbl_products')->where('product_id',$product_id)
    	->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    	->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    	->select('tbl_products.*','tbl_manufacture.manufacture_name','tbl_category.category_name')
    	->first();

        // echo "<pre>";
        // print_r($info);
        // echo "</pre>";
        // exit();
      	$manage=view('admin.edit_product')->with('info',$info);
    	return view('admin_layout')->with('admin.edit_product',$manage);

    }

    public function update_product(Request $request,$product_id)
    {
    	   	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['publication_status']=$request->publication_status;

    	$image=$request->file('product_image');
    	if($image)
    	{
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.".".$ext;
    		$upload_path='image/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['product_image']=$image_url;
    			DB::table('tbl_products')->where('product_id',$product_id)->update($data);
    			Session::put('messeges','Successfully Product Updated');
    			return redirect::to('/all_product');
    		}
    	}
    	else
    	{
    		$data['product_image']='';
    			DB::table('tbl_products')->where('product_id',$product_id)->update($data);
    			Session::put('messeges','Successfully Product Updated Without image');
    			return redirect::to('/all_product');
    	}
    }

    public function save_product(Request $request)
    {
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['publication_status']=$request->publication_status;

    	$image=$request->file('product_image');
    	if($image)
    	{
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.".".$ext;
    		$upload_path='image/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['product_image']=$image_url;
    			DB::table('tbl_products')->insert($data);
    			Session::put('messeges','Successfully Product Uploaded');
    			return redirect::to('/add_product');
    		}
    	}
    	else
    	{
    		$data['product_image']='';
    			DB::table('tbl_products')->insert($data);
    			Session::put('messeges','Successfully Product Uploaded Without image');
    			return redirect::to('/add_product');
    	}
 
    }

}
