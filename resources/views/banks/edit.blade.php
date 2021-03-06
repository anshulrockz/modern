@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Bank Details</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('bank-details')}}">Bank Details</a></li>
            <li><a href="{{ url('bank-details/'.$bank->id)}}">{{ $bank->name }}</a></li>
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
                    <h4 class="panel-title">Edit Bank Details</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('bank-details.update',$bank->id)}}">
		                <div class="form-body">
	                            {{ csrf_field() }}
	                            {{ method_field('PUT') }}
							    <div class="form-group">
							      <label>*Name:</label>
							      <input type="text" class="form-control" name="name" id="name" value="{{ $bank->name }}" placeholder="Please Enter Bank Name" >
							    </div>
							    <div class="form-group">
							      <label>*Payee:</label>
							      <input type="text" class="form-control" name="payee" id="payee" value="{{ $bank->payee }}" placeholder="Please Enter Payee Name" >
							    </div>
							    <div class="form-group">
							      <label>*Account Number:</label>
							      <input type="text" class="form-control" name="account_no" id="account_no" value="{{ $bank->account_no }}" placeholder="Please Enter Account Number" >
							    </div>
							    <div class="form-group">
							      <label>*IFSC:</label>
							      <input type="text" class="form-control" name="ifsc" id="ifsc" value="{{$bank->ifsc }}" placeholder="Please Enter IFSC Code" >
							    </div>
							    <div class="form-group">
							      <label>*Bank Branch:</label>
							      <input type="text" class="form-control" name="bank_branch" id="bank_branch" value="{{ $bank->bank_branch }}" placeholder="Please Enter Bank Branch Address" >
							    </div>
		                        </div>
	                        <div class="form-actions">
	                            <button type="submit" class="btn btn-info">Update</button>
	                            <button type="button" class="btn default" onclick="location.href = '{{url('bank-details')}}';">Cancel</button>
	                        </div>
		            </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection