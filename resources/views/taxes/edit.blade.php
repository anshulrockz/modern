@extends('layouts.app')
@section('content')
<link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css"/>
<div class="page-title">
    <h3>Taxes</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/taxes')}}">Taxes</a></li>
            <li><a href="{{ url('/taxes/'.$tax->id)}}">{{ $tax->name }}</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<!--Content Here-->
    	<div class="col-md-6">
    		@include('layouts.flashmessage')
    		<div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Edit</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('taxes.update',$tax->id)}}">
		                <div class="form-body">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
						    <div class="form-group">
						      <label>*Name:</label>
						      <input type="text" class="form-control" name="name" id="name" value="{{ $tax->name }}" placeholder="Please Enter Name" required="">
						    </div>
						    <div class="form-group">
						      <label>*Rate(%):</label>
						      <input type="number" class="form-control" name="rate" id="rate" value="{{ $tax->rate }}" placeholder="Please Enter Rate" required="">
						    </div>
						    <div class="form-group">
								 <label>Effective From:</label>
								 <div class="input-group date">
								   <input type="text" name="effective_from" id="effective_from" value="{{ $tax->effective_from->format('d-M-Y') }}" placeholder="Please Enter Effective From" class="form-control" required=""><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								 </div>
							</div>
						    <div class="form-group">
						      <label>Description:</label>
						      <textarea class="form-control" name="description" id="description" placeholder="Please Enter Description">{{ $tax->description }}</textarea>
						    </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-info">Update</button>
                            <button type="button" class="btn default" onclick="location.href = '{{url('/taxes')}}';">Cancel</button>
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
        format: "yyyy-mm-d",//dd-MM-yyyy,yyyy-mm-d
        //startDate: today
    });
});
</script>
@endsection