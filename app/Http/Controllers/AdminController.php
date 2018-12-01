<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;	
use Session;	
use Illuminate\support\Facades\redirect;
session_start();

class AdminController extends Controller
{
   public function admin_auth_cehck_login()
    {
        $admin_id=Session::get('admin_id');
        if(!$admin_id)
        {
            return;
        }
        else
        {
            return redirect::to('/dashboard')->send();
        }
    }

       public function index()
    {
      $this->admin_auth_cehck_login();
       return view('admin_login');
      }

         public function show_dashboard()
         {
         
         }


         public function dashboard(Request $request)
         {
         	$admin_email=$request->admin_email;
         	$admin_password=$request->admin_password;
         	$result=DB::table('tbl_admin')->where('admin_email',$admin_email)
         	->where('admin_password',$admin_password)->first();
         	// var_dump($result);	

         	if($result)
         	{
         		Session::put('admin_name',$result->admin_name);
         		Session::put('admin_id',$result->admin_id);
         		return redirect::to('/dashboard');
         	}
         	else
         	{
         		Session::put('messeges','Email or Password is Invalid');
         		return redirect::to('/admin');
         	}
         }
}
