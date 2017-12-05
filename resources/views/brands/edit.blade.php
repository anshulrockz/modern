@extends('layouts.app')
@section('content')
<div class="page-title">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/units')}}">Units</a></li>
            <li><a href="{{ url('/units/'.$unit->id)}}">{{ $unit->name }}</a></li>
            <li class="active">Edit</li>
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
                    <h4 class="panel-title">Edit</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('units.update',$unit->id)}}">
		                <div class="form-body">
	                            {{ csrf_field() }}
	                            {{ method_field('PUT') }}
							    <div class="form-group">
							      <label>*Name:</label>
							      <input type="text" class="form-control" name="name" id="name" value="{{ $unit->name }}" placeholder="Please Enter Name" required="">
							    </div>
							    <div class="form-group">
							      <label>Description:</label>
							      <textarea class="form-control" name="description" id="description" placeholder="Please Enter Description">{{ $unit->description }}</textarea>
							    </div>
	                        </div>
	                        <div class="form-actions">
	                            <button type="submit" class="btn btn-info">Update</button>
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