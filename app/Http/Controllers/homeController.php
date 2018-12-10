<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;

class homeController extends Controller
{
    public function index(){
    	$all_product = Product::where('publication_status','=',1)->take(9)->get();
    	return view('pages.index')->with('all_product',$all_product);
    }

    public function productsByCategory($category_id){
    	$all_product = Product::where('category_id','=',$category_id)
    							->where('publication_status',1)
    							->get();
    	return view('pages.productsByCategory')->with('all_product',$all_product);
    }

    public function productsByManufacture($manufacture_id){
    	$all_product = Product::where('manufacture_id','=',$manufacture_id)
    							->where('publication_status',1)
    							->get();
    	return view('pages.productsByManufacture')->with('all_product',$all_product);
    }

    public function productDetails($product_id){
    	$product = Product::find($product_id);
    	return view('pages.productDetails')->with('product',$product);
    }
}
