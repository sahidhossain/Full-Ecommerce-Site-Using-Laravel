<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\support\Facades\redirect;

class ManufactureController extends Controller
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

    public function add_manufacture()
    {
        $this->admin_auth_cehck();
    	return view('admin.add_manufacture');
    }

    public function save_manufacture(Request $request)
    {
    	$data=array();
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	$data['publication_status']=$request->publication_status;
    	$result=DB::table('tbl_manufacture')->insert($data);
    	if($result)
    	{
    		Session::put('messeges','Successfully inserted ');
    		return redirect::to('/add_manufacture');
    	}
    	else
    	{
    		Session::put('messeges','Something is wrong');
    	}
    }
    public function all_manufacture()
    {
        $this->admin_auth_cehck();
    	$information_manufacture=DB::table('tbl_manufacture')->get();
    	$manage_manufacture=view('admin.all_manufacture')->with('info',$information_manufacture);
    	return view('admin_layout')->with('admin.all_manufacture',$manage_manufacture);
    	// $information_manufacture=DB::table('tbl_manufacture')->get();
    	// $manage_manufacture=view('admin.all_manufacture')->with('info',$information_manufacture);
    	// return view('admin_layout')->with('admin.all_manufacture',$manage_manufacture);
    }

    public function unactive($manufacture_id)
    {
    	$update=DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>0]);
    	if($update)
    	{
    		Session::put('messeges','Unactive_Successfully');
    		return redirect::to('/all_manufacture');
    	}
    	else
    	{
      		Session::put('messeges','Something has occured problem in Unactive');;
    		return redirect::to('/all_manufacture');  		
    	}
    }

    public function active($manufacture_id)
    {
    	DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>1]);
        Session::put('messeges','Manufacture Activated Successfully');
        return redirect::to('/all_manufacture');
    }
    public function delete_manufacture($manufacture_id)
    {
    	DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->delete();
    	Session::put('messeges','Deleted Successfully');
    	return redirect::to('/all_manufacture');
    }
    public function edit_manufacture($manufacture_id)
    {
    	$info=DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->first();
    	$manage=view('admin.edit_manufacture')->with('info',$info);
    	return view('admin_layout')->with('admin.edit_manufacture',$manage);
    }
    public function update_manufacture(Request $request,$manufacture_id)
    {
    	$data=array();
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	$data['publication_status']=$request->publication_status;

    	$update=DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update($data);
    	if($update)
    	{
    	Session::put('messeges','Update Successfully');
        return redirect::to('/all_manufacture');
    	}
    	else
    	{
    	Session::put('messeges','Update Not Done');
        return redirect::to('/all_manufacture');
    	}
    }
}
