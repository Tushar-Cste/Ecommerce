@extends('admin_layout')
@section('dashboard_content')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">All Products</a></li>
	</ul>

	<p class="alert-success">
		@php 
			$message = Session::get('message');
			echo $message;
			if($message)
				Session::put('message',null);
		@endphp
	</p>

	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Product Id</th>
						  <th>Product Name</th>
						  <th>Product Image</th>
						  <th>Category Name</th>
						  <th>Manufacture Name</th>
						  <th>Status</th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  @foreach($all_product as $product)
				  <tbody>
					<tr>
						<td>{{$product->id}}</td>
						<td class="center">{{$product->product_name}}</td>
						<td class="center"><img src="/storage/product_images/{{$product->product_image}}" style="width: 100px; height: 80px;" ></td>
						<td class="center">{{$product->category->category_name}}</td>
						<td class="center">{{$product->manufacture->manufacture_name}}</td>
						<td class="center">
							@if($product->publication_status == 1)
								<span class="label label-success">active</span>
							@else
								<span class="label label-warning">pending</span>
							@endif
						</td>
						<td class="center">
						  @if($product->publication_status == 1)
							<a class="btn btn-success" href="{{URL::to('/unactive_product/'.$product->id)}}">
								<i class="halflings-icon white thumbs-up"></i> 
							</a>
							@else
								<a class="btn btn-warning" href="{{URL::to('/active_product/'.$product->id)}}">
									<i class="halflings-icon white thumbs-down"></i> 
								</a>
							@endif
							<a class="btn btn-info" href="{{URL::to('/editproduct/'.$product->id)}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{URL::to('/deleteproduct/'.$product->id)}}" id="delete">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					
				  </tbody>
				  @endforeach
			  </table>            
			</div>
		</div><!--/span-->
	
	</div><!--/row-->

@endsection 