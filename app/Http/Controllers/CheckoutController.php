<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use App\Payment;
use App\Order;
use App\OrderDetails;
use Cart;
use Session;

class CheckoutController extends Controller
{
    public function loginToCheck(){
    	return view('pages.loginToCheck');
    }

    public function storeCheckout(Request $request){
    	$data = array();
    	$customer = new Customer;
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['password'] = md5($request->password);
    	$data['mobile_no']= $request->mobile_no;
    	$customer_id = Customer::insertGetId($data);
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
        return redirect('/checkout');
    	//return view('pages.checkout');
    }

    public function checkout(){
        return view('pages.checkout');
    }

    public function storeShippingInfo(Request $request){
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_first_name'] = $request->shipping_first_name;
        $data['shipping_last_name'] = $request->shipping_last_name;
        $data['address'] = $request->address;
        $data['mobile_no'] = $request->mobile_no;
        $shipping_id = Shipping::insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return redirect('/payment');
    }

    public function logoutCustomer(){
        Session::flush();
        return redirect('/');
    }

    public function checkoutLogin(Request $request){
        $customer = Customer::where('customer_email','=',$request->customer_email)
                            ->where('password','=',md5($request->password))
                            ->first();
        if($customer){
            Session::put('customer_id',$customer->id);
            return redirect('/checkout');
        }
        else
            return redirect('/loginToCheck');
    }

    public function payment(){
        return view('pages.payment');
    }

    public function orderPlace(Request $request){
        $pdata= array();
        $pdata['payment_method'] = $request->payment;
        $pdata['payment_status'] = 1;
        $payment_id = Payment::insertGetId($pdata);

        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shipping_id'] = Session::get('shipping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 0;
        $order_id = Order::insertGetId($odata);

        $oddata=array();
        $contents = Cart::content();
        foreach($contents as $content){
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $content->id;
            $oddata['product_name'] = $content->name;
            $oddata['product_price'] = $content->price;
            $oddata['product_sales_qty'] = $content->qty;
            OrderDetails::insert($oddata);
        }

        /*settype($a, "string"); 
        $a = Cart::total();
        echo $a."<br>";
        print_r(Cart::total());
        echo Cart::total();*/
        Cart::destroy();
        return view('pages.bkashPayment');
        
    }
}
