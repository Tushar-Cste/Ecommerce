<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use DB;
session_start();
class CategoryController extends Controller
{
    public function index(){
        $this->adminAuthCheck();
    	return view('admin.addCategory');
    }

    public function allCategory(){
        $this->adminAuthCheck();
        $allCategory = Category::all();
        $manage_category = view('admin.allCategory')->with('allCategory',$allCategory);
    	return view('admin.allCategory')->with('allCategory',$allCategory);
        //return view('admin_layout')->with('Category',$manage_category);
    }

    public function storeCategory(Request $request){
        $this->adminAuthCheck();
    	$category = new Category;
    	$category->category_name = $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->publication_status = $request->publication_status;
    	$category->save();
    	Session::put('message','Category is added successfully');
    	return redirect('/addCategory');
    }

    public function unactive_category($category_id){
        $category = Category::find($category_id);
        $category->publication_status = 0;
        $category->save();
        Session::put('message','Category is unactivated successfully');
        return redirect('/allCategory');

    }

     public function active_category($category_id){
        $category = Category::find($category_id);
        $category->publication_status = 1;
        $category->save();
        Session::put('message','Category is activated successfully');
        return redirect('/allCategory');

    }

    public function edit_category($category_id){
        $this->adminAuthCheck();
        $category = Category::find($category_id);
        return view('admin.edit_category')->with('category',$category);
    }

    public function update_category(Request $request,$category_id){
        $this->adminAuthCheck();
        /*$category = Category::find($category_id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();*/

        $category = array();
        $category['category_name'] = $request->category_name;
        $category['category_description']=$request->category_description;

        DB::table('categories')
            ->where('id',$category_id)
            ->update($category);
        Session::put('message','Category is updated successfully');
        return redirect('/allCategory');
    }

    public function delete_category($category_id){
        $this->adminAuthCheck();
        $category = Category::find($category_id);
        $category->delete();
        Session::put('message','Category is deleted successfully');
        return redirect('/allCategory');
    }

    public function adminAuthCheck(){
        $admin = Session::get('admin_id');
        if($admin)
            return;
        else
            return redirect('/admin')->send();
    }
}
