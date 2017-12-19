@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Terms & Conditions</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
            <li><a href="{{ url('/terms/'.$term->id)}}">{{ $term->id }}</a></li>
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
                    <h4 class="panel-title">Edit Terms & Conditions</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('terms.update',$term->id)}}">
		                <div class="form-body">
	                            {{ csrf_field() }}
	                            {{ method_field('PUT') }}
							    <div class="form-group">
							      <label>*Terms & Conditions:</label>
							      <input type="text" class="form-control" name="term" id="term" value="{{ $term->term }}" placeholder="Please Enter Terms & Conditions" required="">
							    </div>
	                        </div>
	                        <div class="form-actions">
	                            <button type="submit" class="btn btn-info">Update</button>
	                            <button type="button" class="btn default" onclick="location.href = '{{url('/terms')}}';">Cancel</button>
	                        </div>
		            </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection