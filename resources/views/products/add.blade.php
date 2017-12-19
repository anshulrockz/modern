@extends('layouts.app')
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-title">
    <h3>Products</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/products')}}">Products</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<!--Content Here-->
    	<div class="col-md-12">
    		@include('layouts.flashmessage')
    		<div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Add Product</h4>
                </div>
                <div class="panel-body">
            		<form class="form-custom" method="post" action="{{route('products.store')}}">
                        <div class="row form-body">
                            {{ csrf_field() }}
        					<div class="col-md-6">
							    <div class="form-group">
							      <label>*Name:</label>
							      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Please Enter Name" required="">
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							      <label>*Category:</label>
							      <select name="category" id="category" class="form-control">
								     <option>Select</option>
								     @foreach($category as $category)
								     <option value="{{ $category->id }}">{{ $category->name }}</option>
								     @endforeach
								 </select>
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							      <label>*Model:</label>
							      <input type="text" class="form-control" name="model" id="model" value="{{ old('model') }}" placeholder="Please Enter Model" required="">
							    </div>
							</div>
        					<div class="col-md-6">
							    <div class="form-group">
							      <label>*Price:</label>
							      <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Please Enter Price" required="">
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							     	<label>*Unit:</label>
							    	<select name="unit" id="unit" class="form-control">
									    <option>Select</option>
									    @foreach($unit as $unit)
									     <option value="{{ $unit->id }}">{{ $unit->name }}</option>
									     @endforeach
									</select>
							    </div>
							</div>
        					<div class="col-md-6">
							    <div class="form-group">
							    	<label>*Brand:</label>
							    	<select name="brand" id="brand" class="form-control">
									    <option>Select</option>
									    @foreach($brand as $brand)
									     <option value="{{ $brand->id }}">{{ $brand->name }}</option>
									     @endforeach
									</select>
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
								    <label>*Manufacturer:</label>
								    <select name="manufacturer" id="manufacturer" class="form-control">
									    <option>Select</option>
										@foreach($manufacturer as $manufacturer)
									     <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
									     @endforeach
									</select>
							    </div>
							</div>
        					<div class="col-md-6">
							    <div class="form-group">
							      <label>*Pack Size:</label>
							      <input type="text" class="form-control" name="pack_size" id="pack_size" value="{{ old('pack_size') }}" placeholder="Please Enter Pack Size" required="">
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							      <label>*Notify Quantity:</label>
							      <input type="text" class="form-control" name="notify_quantity" id="notify_quantity" value="{{ old('notify_quantity') }}" placeholder="Please Enter Notify Quantity" required="">
							    </div>
							</div>
						</div>
						<div class="row form-actions">
	                        <div class="col-md-12">
			                    <button type="submit" class="btn btn-info">Save</button>
			                    <button type="button" class="btn default" onclick="location.href = '{{url('/products')}}';">Cancel</button>
			                </div>
		                </div>
                    </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection