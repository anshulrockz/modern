@extends('layouts.app')
@section('content')
<!-- BEGIN CONTENT -->
<style type="text/css">
	input.form-control{
		width: 92%;
		display: inline-block;
	}
	
	.btn-custom{
		margin-top: 10px;
	}
</style>
<div class="page-title">
    <h3> Terms & Conditions</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('terms')}}"> Terms & Conditions</a></li>
            <li class="active">Add</li>
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
                    <h4 class="panel-title">Add Terms & Conditions</h4>
                </div>
                <div class="panel-body">
                	<form class="form-custom" method="post" action="{{route('terms.store')}}">
		                <div class="form-body" id="terms_field">
		                    {{ csrf_field() }}
		                    <div class="form-group">
						    	<label> Term & Conditions:</label>
						    </div>
						    <div class="input-group m-b-sm">
                                <input type="text" class="form-control" name="term[]" id="term[]" placeholder="Please Enter Term & Conditions" value="{{ old('term[]') }}">
                                <span class="input-group-btn" id=""><button class="btn btn-success add_field_button"><i class="fa fa-plus"></i></button></span>
                            </div>
		                </div>
		                <div class="form-actions">
		                    <button type="submit" class="btn btn-info">Save</button>
		                    <button type="button" class="btn default" onclick="location.href = '{{url('terms')}}';">Cancel</button>
		                </div>
		            </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    //var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var wrapper         = $("#terms_field"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            //$(wrapper).append('<div class="form-group"><input class="form-control" name="term[]" id="term" placeholder="Please Enter Term & Conditions" value="{{ old('term[]') }}"><a href="#" class="remove_field">Remove</a></div>'); //add input box
            //$(wrapper).append('<div class="form-group"><input class="form-control" name="term[]" id="term" placeholder="Please Enter Term & Conditions" value="{{ old('term[]') }}"><button href="#" class="btn-custom btn btn-danger m-b-sm remove_field"><i class="fa fa-minus"></i></button></div>'); //add input box
            $(wrapper).append('<div class="input-group m-b-sm"><input type="text" class="form-control" name="term[]" id="term[]" placeholder="Please Enter Term & Conditions" value="{{ old('term[]') }}"><span class="input-group-btn" id="remove_field"><button href="#" class="btn btn-danger"><i class="fa fa-minus"></i></button></span></div>'); //add input box
        }
    });
    
    $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<!-- END CONTENT -->
@endsection