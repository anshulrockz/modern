@extends('layouts.app')
@section('content')
<link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-title">
	<h3>Opening Stocks</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/opening-stocks')}}">Opening Stocks</a></li>
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
                    <h4 class="panel-title">Add Opening Stock</h4>
                </div>
                <div class="panel-body">
                	<form class="form-custom" method="post" action="{{route('opening-stocks.store')}}">
	                    <div class="row form-body">
	                        {{ csrf_field() }}
	            			<div class="col-md-6">
	            	            <div class="form-group">
								 <label>*Category:</label>
								 <select name="category" id="category" class="form-control">
								     <option>Select</option>
								     @foreach($category as $category)
								     <option value="{{$category->id}}">{{$category->name}}</option>
								     @endforeach
								 </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								 <label>*Product:</label>
								 <select name="product" id="product" class="form-control">
								     <option>Select</option>
								     @foreach($product as $product)
								     <option value="{{$product->id}}">{{$product->name}}</option>
								     @endforeach
								 </select>
								</div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							      <label>Barcode:</label>
							      <input type="text" class="form-control" name="barcode" id="barcode" value="{{ old('barcode') }}" placeholder="Please Enter Barcode" >
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
								 <label>*Expiry Date:</label>
								 <div class="input-group date">
								   <input type="text" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}" placeholder="Please Enter Expiry Date" class="form-control" required=""><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								 </div>
								</div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							      <label>*Quantity:</label>
							      <input type="number" class="form-control" name="quantity" id="quantity" value="{{ old('quantity') }}" placeholder="Please Enter Quantity" required="">
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
							      <label>*Cost:</label>
							      <input type="number" class="form-control" name="cost" id="cost" value="{{ old('cost') }}" placeholder="Please Enter Cost" required="">
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
								 <label>*Date:</label>
								 <div class="input-group date">
								 	<input type="text" name="date" id="date" value="{{ old('date') }}" placeholder="Please Enter Date" class="form-control" required=""><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								 </div>
								</div>
	                        </div>
	                        <div class="col-md-6">
		                        <div class="form-group">
							      <label>Description:</label>
							      <textarea class="form-control" cols="1" name="description" id="description" placeholder="Please Enter Description">{{ old('description') }}</textarea>
							    </div>
						    </div>
	                    </div>
	                    <div class="row form-actions">
	                    	<div class="col-md-12 ">
			                    <button type="submit" class="btn btn-info">Save</button>
			                    <button type="button" class="btn default" onclick="location.href = '{{url('/opening-stocks')}}';">Cancel</button>
		                	</div>
		                </div>
	                </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type='text/javascript'>
$(function(){
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0); 
    $('.date').datepicker({
        calendarWeeks: true,
        todayHighlight: true,
        autoclose: true,
        format: "dd-MM-yyyy",//" yyyy-mm-d",
        //startDate: today
    });
});
</script>
@endsection