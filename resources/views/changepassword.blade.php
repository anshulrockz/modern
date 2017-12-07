@extends('layouts.app')
@section('content')
<script src="{{asset('assets/plugins/scripts/modernizr.custom.js')}}" type="text/javascript"></script>
<style>
	.my-toggle-class {
		color: #888;
		cursor: pointer;
		font-size: 0.75em;
		font-weight: bold;
		padding: 0.5em 1em;
		text-transform: uppercase;
	}
</style>
<!-- BEGIN CONTENT -->
<div class="page-title">
    <h3>Change Password</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Change Password</li>
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
                    <h4 class="panel-title">Change Password</h4>
                </div>
                <div class="panel-body">
		    		<form method="post" action="{{ action('ChangepasswordController@update') }}">
			          	{{ csrf_field() }}
					    <div class="form-group">
					      <label>*Old Password:</label>
					      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter old password" required="">
					    </div>
					    <div class="form-group">
					      <label>*New Password:</label>
					      <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required="">
					    </div>
					    <div class="form-group">
					      <label>*Confirm New Password:</label>
					      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm new password" required="">
					    </div>
					    <button type="submit" class="btn btn-info">Update</button>
		                <button type="button" class="btn default" onclick="location.href = '{{url('/')}}';">Cancel</button>
					</form>
				</div>
			</div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
<!-- Include the plugin. Yay! --> 
<script src="{{asset('assets/pages/scripts/hideShowPassword.min.js')}}" type="text/javascript"></script>
<script>
// Example 2
$('#old_password,#password,#confirm_password').hideShowPassword({
  // Make the password visible right away.
  show: false,
  // Create the toggle goodness.
  innerToggle: true,
  // Give the toggle a custom class so we can style it
  // separately from the previous example.
  toggleClass: 'my-toggle-class',
  // Don't show the toggle until the input triggers
  // the 'focus' event.
  hideToggleUntil: 'focus',
  // Enable touch support for toggle.
  touchSupport: Modernizr.touch
});
</script>
@endsection