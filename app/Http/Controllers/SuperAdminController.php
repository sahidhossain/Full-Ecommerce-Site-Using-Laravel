<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();	

class SuperAdminController extends Controller
{
    public function logout()
    {
    	Session::put('admin_name',null);
    	Session::put('admin_id',null);
    	return redirect::to('/	admin');
    }

    public function index()
    {
    	$this->admin_auth_cehck();
    	return view('admin.dashboard');
    }

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
}
