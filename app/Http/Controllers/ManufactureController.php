<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;
use Session;

class ManufactureController extends Controller
{
    public function index(){
    	$this->adminAuthCheck();
    	return view('admin.addManufacture');
    }

    public function storeManufacture(Request $request){
    	$this->adminAuthCheck();
    	$manufacture = new Manufacture;
    	$manufacture->manufacture_name = $request->manufacture_name;
    	$manufacture->manufacture_description = $request->manufacture_description;
    	$manufacture->publication_status = $request->publication_status;
    	$manufacture->save();
    	Session::put('message','Manufacture is added successfully');
    	return redirect('/addManufacture');
    }

    public function allManufacture(){
    	$this->adminAuthCheck();
        $allManufacture = Manufacture::all();
    	return view('admin.allManufacture')->with('allManufacture',$allManufacture);
    }

    public function unactive_manufacture($manufacture_id){
    	$manufacture = Manufacture::find($manufacture_id);
    	$manufacture->publication_status = 0;
    	$manufacture->save();
    	/*Session::put('message','Manufacture is unactivated');*/
    	return redirect('/allManufacture');
    }

    public function active_manufacture($manufacture_id){
    	$manufacture = Manufacture::find($manufacture_id);
    	$manufacture->publication_status = 1;
    	$manufacture->save();
    	Session::put('message','Manufacture is activated');
    	return redirect('/allManufacture');
    }

    public function editManufacture($manufacture_id){
    	$this->adminAuthCheck();
    	$manufacture = Manufacture::find($manufacture_id);
    	return view('admin.editManufacture')->with('manufacture',$manufacture);
    }

    public function update_manufacture(Request $request,$manufacture_id){
    	$this->adminAuthCheck();
    	$manufacture = Manufacture::find($manufacture_id);
    	$manufacture->manufacture_name = $request->manufacture_name;
    	$manufacture->manufacture_description = $request->manufacture_description;
    	$manufacture->save();
    	return redirect('/allManufacture');
    }

    public function delete_manufacture($manufacture_id){
    	$this->adminAuthCheck();
        $manufacture = Manufacture::find($manufacture_id);
        $manufacture->delete();
        Session::put('message','Manufacture is deleted successfully');
        return redirect('/allManufacture');
    }

    public function adminAuthCheck(){
    	$admin = Session::get('admin_id');
    	if($admin)
    		return;
    	else
    		return redirect('/admin')->send();
    }
}
