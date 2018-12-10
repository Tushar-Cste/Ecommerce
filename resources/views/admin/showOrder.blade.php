@extends('admin_layout')
@section('dashboard_content')
<div class="box span11">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-bordered table-striped table-condensed">
			  <thead>
				  <tr>
					  <th>Customer Name</th>
					  <th>Mobile Number</th>                                          
				  </tr>
			  </thead>   
			  <tbody>
				<tr>
					<td>{{$order->customer->customer_name}}</td>
					<td class="center">{{$order->customer->mobile_no}}</td>                                       
				</tr>
				                               
			  </tbody>
		 </table>  
		    
	</div>
</div>


<div class="box span11">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-bordered table-striped table-condensed">
			  <thead>
				  <tr>
					  <th>Shipping Name</th>
					  <th>Email</th>    
					  <th>Address</th>  
					  <th>Mobile Number</th>                                    
				  </tr>
			  </thead>   
			  <tbody>
				<tr>
					<td>{{$order->shipping->shipping_first_name." ".$order->shipping->shipping_last_name}}</td>
					<td class="center">{{$order->shipping->shipping_email}}</td>     
					<td>{{$order->shipping->address}}</td>
					<td>{{$order->shipping->mobile_no}}</td>                                  
				</tr>
				                               
			  </tbody>
		  </table>  
		    
	</div>
</div>


<!-- table for order details -->

<div class="box span11">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-bordered table-striped table-condensed">
			  <thead>
				  <tr>
					  <th>Product Name</th>
					  <th>Product Price</th>
					  <th>Product Quantity</th>
					  <th>Product Total Price</th>                                          
				  </tr>
			  </thead>   
			  <tbody>
			  @php 
			  	$all_order_details = $order->order_details;
			  	$total = 0;
			  @endphp
			  @foreach($all_order_details as $order_detail)
			  	@php
			  		$total = $total + $order_detail->product_price * $order_detail->product_sales_qty;
			  	@endphp
				<tr>
					<td>{{$order_detail->product_name}}</td>
					<td class="center">{{$order_detail->product_price}}</td>
					<td class="center">{{$order_detail->product_sales_qty}}</td> 
					<td>{{$order_detail->product_price * $order_detail->product_sales_qty}}</td>                                      
				</tr> 
			@endforeach
				<tr>
					<th colspan="3">Total:</th>
					<th>{{$total}}</th>                                      
				</tr>                                
			  </tbody>
		 </table>  
		    
	</div>
</div>

@endsection