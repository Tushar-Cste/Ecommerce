<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use Session;
use Cart;

class CartController extends Controller
{
 	public function addToCart(Request $request, $product_id){
 		$qnty = $request->qnty;
 		$product = Product::find($product_id);
 		$data = array();
 		$data['id'] = $product->id;
 		$data['name'] = $product->product_name;
 		$data['qty']= $qnty;
 		$data['price'] = $product->product_price;
 		$data['options']['image'] = $product->product_image;

 		Cart::add($data);
 		return redirect('/showCart');
 	}   

 	public function showCart(){
 		$all_published_category = Category::where('publication_status',1)->get();
 		return view('pages.addToCart')->with('all_published_category',$all_published_category);
 	}

 	public function deleteFromCart($row_id){
 		Cart::update($row_id,0);
 		return redirect('/showCart');
 	}

 	public function updateCart(Request $request){
 		$qnty = $request->quantity;
 		$row_id = $request->row_id;
 		Cart::update($row_id,$qnty);
 		return redirect('/showCart');
 	}
}
