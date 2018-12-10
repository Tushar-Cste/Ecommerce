@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container col-sm-12 col-md-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			@php 
				$contents = Cart::content();
				/*echo "<pre>";
				print_r($contents);
				echo "<pre>";
				exit();*/
			@endphp
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('/storage/product_images/'.$content->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/updateCart')}}" method="post">
										{{csrf_field()}}
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$content->qty}}" autocomplete="off" size="2">
										<input type="hidden" value="{{$content->rowId}}" name="row_id">
										<input type="submit" name="submit" value="update" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$content->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/deleteFromCart/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container col-sm-12 col-md-12">
			
			<div class="row">
				
				<div class="col-sm-8 col-md-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							@if(Session::get('customer_id')!=NULL && Session::get('shipping_id')!=NULL)
								<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Check Out</a>
							@elseif(Session::get('customer_id')!=NULL)
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
							@else
								<a class="btn btn-default check_out" href="{{URL::to('/loginToCheck')}}">Check Out</a>
							@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection