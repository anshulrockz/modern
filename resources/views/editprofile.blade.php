@extends('layouts.app')
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
		<div class="page-bar">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{url('/')}}"><i class="icon-home"></i> Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span class="active">Edit Profile</span>
                </li>
            </ul>
        </div>
		<div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-blue-sharp bold uppercase">Edit Profile</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                	<div class="col-md-6">
                		@include('flashmessage')
                		<form method="post" action="{{ action('EditprofileController@save') }}" enctype="multipart/form-data">
	                        <div class="form-body">
	                            {{ csrf_field() }}
							    <div class="form-group">
							      <label>*Name:</label>
							      <input type="text" class="form-control" name="name" id="name" value="{{ $profile[0]->name}}" placeholder="Enter your name" required="">
							    </div>
							    <div class="form-group">
							      <label>*Email:</label>
							      <input type="email" class="form-control" name="email" id="email" value="{{ $profile[0]->email}}" placeholder="Enter your email" required="">
							    </div>
							    <div class="form-group">
							      <label>Mobile:</label>
							      <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $profile[0]->mobile}}" placeholder="Enter your mobile (10 digits only)" maxlength="10">
							    </div>
							    <div class="form-group">
							      <label>Image:</label>
							      <input class="form-control" type="file" name="image" accept="image/*" />
							      @if($profile[0]->avatar != '')
							      <img style="margin-top: 10px" width="100px" src="{{ url('/backend/uploads/'.Auth::id().md5(Auth::user()->name).'/'.$profile[0]->avatar) }}"/>
							      @endif
							    </div>
	                        </div>
	                        <div class="form-actions">
	                            <button type="submit" class="btn blue">Update</button>
	                            <button type="button" class="btn default" onclick="location.href = '{{url('/')}}';">Cancel</button>
	                        </div>
	                    </form>
                	</div>
                </div>
            </div>
	    </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection