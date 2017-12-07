@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Edit Profile</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('profile')}}">Profile</a></li>
            <li class="active">Edit Profile</li>
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
                    <h4 class="panel-title">edit profile</h4>
                </div>
                <div class="panel-body">
		    		<form method="post" action="{{ action('ProfileController@update') }}" enctype="multipart/form-data">
			          	{{ csrf_field() }}
	          			<div class="form-group">
					      <label>*Name:</label>
					      <input type="text" class="form-control" name="name" id="name" value="{{ $profile->name}}" placeholder="Enter your name" required="">
					    </div>
					    <div class="form-group">
					      <label>*Email:</label>
					      <input type="email" class="form-control" name="email" id="email" value="{{ $profile->email}}" placeholder="Enter your email" required="">
					    </div>
					    <div class="form-group">
					      <label>Mobile:</label>
					      <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $profile->mobile}}" placeholder="Enter your mobile (10 digits only)" maxlength="10">
					    </div>
					    <div class="form-group">
					      <label>Image:</label>
					      <input class="form-control" type="file" name="image" accept="image/*" />
					      @if($profile->avatar != '')
					      <img style="margin-top: 10px" width="100px" src="{{ url('/uploads/'.Auth::id().md5(Auth::user()->name).'/'.$profile->avatar) }}"/>
					      @endif
					    </div>
	                    <div class="form-actions">
	                        <button type="submit" class="btn btn-info">Update</button>
	                        <button type="button" class="btn default" onclick="location.href = '{{url('profile')}}';">Cancel</button>
	                    </div>
	                </form>
	            </div>
	    	</div>
	    </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection