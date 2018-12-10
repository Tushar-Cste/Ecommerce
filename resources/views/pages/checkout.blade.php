@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
			

			<div class="register-req">
				<p>.....................Please fillup the form.......................</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{url('/storeShippingInfo')}}" method="post">
									{{csrf_field()}}
									
									<input type="text" name="shipping_email" placeholder="Email*">
									
									<input type="text" name="shipping_first_name" placeholder="First Name *">
									<input type="text" name="shipping_last_name" placeholder="Last Name *">
									<input type="text" name="address" placeholder="Address 2">
									<input type="text" name="mobile_no" placeholder="mobile no">
									<input type="submit" value="Done" class="btn btn-default">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->


@endsection