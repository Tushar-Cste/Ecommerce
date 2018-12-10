@extends('admin_layout')
@section('dashboard_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add Category</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
		</div>
		<p class="alert-success">
			
			</p>
		<div class="box-content">
			<form class="form-horizontal" action="{{url('/updateCategory/'.$category->id)}}" method="post">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="CategoryName">Category Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="CategoryName" name="category_name" value="{{$category->category_name}}">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="CategoryDescription">Category Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="CategoryDescription" name="category_description" rows="10">{{$category->category_description}}</textarea>
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection