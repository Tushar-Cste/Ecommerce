<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin_table;
use DB;
use Session;


session_start();

class AdminController extends Controller
{
    /*public function login(){
    	return view('admin_login');
    }*/

    
    public function index(){
        return view('admin_login');
    }
    

    public function checkdashboard(){
    	return view('admin.check_dashboard');
    }

    /*/*public function dashboardIndex(Request $request){
    	/*$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result = DB::table('admin_tables')
    					->where('admin_email',$admin_email)
    					->where('admin_password',$admin_password)
    					->first();
    		echo "<pre>";
    	 print_r($result);*/
    	 /*$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result = Admin_table::where('admin_email','=',$admin_email)
    						->where('admin_password','=',$admin_password)
    						->first();
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->id);
    		return redirect('/dashboard');
    	}
    	else{
    		Session::put('message','Email or Password is incorrect');
    		return redirect('/admin');
    	}

   
    }/*/
    public function dashboardIndex(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result = Admin_table::where('admin_email','=',$admin_email)
    						->where('admin_password','=',$admin_password)
    						->first();
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->id);
    		return redirect('/dashboard');
    	}
    	//print_r($result);

    	
    }

}
