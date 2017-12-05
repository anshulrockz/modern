@extends('layouts.app')
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-title">
    <h3>Units</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/units')}}">Units</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<!--Content Here-->
    	<div class="col-md-6">
    		@include('flashmessage')
    		<div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Add Unit</h4>
                </div>
                <div class="panel-body">
		    		<form method="post" action="{{route('units.store')}}">
		                <div class="form-body">
		                    {{ csrf_field() }}
						    <div class="form-group">
						      <label>*Name:</label>
						      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Please Enter Name" >
						    </div>
						    <div class="form-group">
						      <label>Description:</label>
						      <textarea class="form-control" name="description" id="description" placeholder="Please Enter Description">{{ old('description') }}</textarea>
						    </div>
		                </div>
		                <div class="form-actions">
		                    <button type="submit" class="btn btn-info">Save</button>
		                    <button type="button" class="btn default" onclick="location.href = '{{url('/units')}}';">Cancel</button>
		                </div>
		            </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection