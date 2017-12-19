@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Accounts</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/accounts')}}">Accounts</a></li>
            <li><a href="{{ url('/accounts/'.$account->id)}}">{{ $account->name }}</a></li>
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
                    <h4 class="panel-title">Edit Accounts</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('accounts.update',$account->id)}}">
		                <div class="form-body">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
						      <label>*Name:</label>
						      <input type="text" class="form-control" name="name" id="name" value="{{ $account->name}}" placeholder="Please Enter Name" >
						    </div>
						    <div class="form-group">
						      	<label>*GST %:</label>
							    <select name="gst" id="gst" class="form-control">
								     <option>Select</option>
								     <option value="5">5</option>
								     <option value="12">12</option>
								     <option value="18">18</option>
								     <option value="24">24</option>
								 </select>
						    </div>
						    <div class="form-group">
						      <label>*HSN Code:</label>
						      <input type="text" class="form-control" name="hsn_code" id="hsn_code" value="{{ $account->hsn_code}}" placeholder="Please Enter HSN Code" >
						    </div>
						    <div class="form-group">
						      <label>*Parent Acount Name:</label>
						      <input type="text" class="form-control" name="pan" id="pan" value="{{ $account->parent_account_number}}" placeholder="Please Enter Parent Acount Name" >
						    </div>
						    <div class="form-group">
						      	<label>ITC Eligibility:</label>
						    	<select name="itc" id="itc" class="form-control">
								     <option>Select</option>
								     <option value="0" @if($account->itc_eligibility==0) selected @endif >No</option>
								     <option value="1" @if($account->itc_eligibility==1) selected @endif >Yes</option>
								 </select>
						    </div>
						</div>
						<div class="form-actions">
                            	<button type="submit" class="btn btn-info">Update</button>
                        </div>
		            </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection