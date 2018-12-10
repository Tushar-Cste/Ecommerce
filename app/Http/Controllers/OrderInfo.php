<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderInfo extends Controller
{
    public function allOrder(){

    	$all_order = Order::all();
    	return view('admin.allOrder')->with('all_order',$all_order);
    }

    public function showOrder($order_id){
    	$order = Order::find($order_id);
    	return view('admin.showOrder')->with('order',$order);
    }
}
