@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Firms</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/firms')}}">Firms</a></li>
            <li><a href="{{ url('/firms/'.$firm->id)}}">{{ $firm->name }}</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<!--Content Here-->
    	<div class="col-md-12">
    		@include('layouts.flashmessage')
    		<div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Edit firm</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('firms.update',$firm->id)}}" enctype="multipart/form-data">
		                <div class="form-body row">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
							<div class="form-group col-md-6">
						      <label>*Firm Name:</label>
						      <input type="text" class="form-control" name="name" id="name" value="{{ $firm->name }}" placeholder="Please Enter Firm Name" required="">
						    </div>
						    <div class="form-group  col-md-6">
						      	<label>Firm Logo:</label>
								<div class="input-group input-file" name="logo">
									<input type="text" class="form-control" placeholder="Select image..." />
						    		<span class="input-group-btn">
						        		<button class="btn btn-warning btn-choose" type="button">Change</button>
						    		</span>
						    	</div>
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Email:</label>
						      <input type="text" class="form-control" name="email" id="email" value="{{ $firm->email }}" placeholder="Please Enter Email" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Mobile:</label>
						      <input type="number" class="form-control" name="mobile" id="mobile" value="{{ $firm->mobile }}" placeholder="Please Enter Mobile" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Website:</label>
						      <input type="text" class="form-control" name="website" id="website" value="{{ $firm->name }}" placeholder="Please Enter Website" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>Landline:</label>
						      <input type="number" class="form-control" name="landline" id="landline" value="{{ $firm->landline }}" placeholder="Please Enter Landline" >
						    </div>
						    <div class="form-group col-md-6">
						      <label>*State:</label>
						      <input type="text" class="form-control" name="state" id="state" value="{{ $firm->state }}" placeholder="Please Enter State" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*City:</label>
						      <input type="text" class="form-control" name="city" id="city" value="{{ $firm->city }}" placeholder="Please Enter City" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Address:</label>
						      <input type="text" class="form-control" name="address" id="address" value="{{ $firm->address }}" placeholder="Please Enter Address" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Pin Code:</label>
						      <input type="number" class="form-control" name="pin_code" id="pin_code" value="{{ $firm->pin_code }}" placeholder="Please Enter Pin Code" required="">
						    </div><br />
						    <div class="form-group col-md-6">
						      <label>Permanent Account Number(PAN):</label>
						      <input type="text" class="form-control" name="pan" id="pan" value="{{ $firm->pan }}" placeholder="Please Enter PAN">
						    </div>
						    <div class="form-group col-md-6">
						      <label>TDS Account Number(TAN):</label>
						      <input type="text" class="form-control" name="tan" id="tan" value="{{ $firm->tan }}" placeholder="Please Enter TAN">
						    </div>
						    <div class="form-group col-md-6">
						      <label>Corporate Identity Number(CIN):</label>
						      <input type="text" class="form-control" name="cin" id="cin" value="{{ $firm->cin }}" placeholder="Please Enter CIN">
						    </div>
						    <div class="form-group col-md-6">
						      <label>GSTIN Registration Status:</label>
						      <input type="text" class="form-control" name="gstin_registration_status" id="gstin_registration_status" value="{{ $firm->gstin }}" placeholder="Please Enter GSTIN Registration Status">
						    </div>
						    <div class="form-group col-md-6">
						      <label>GST No.:</label>
						      <input type="number" class="form-control" name="gst" id="gst" value="{{ $firm->gst }}" placeholder="Please Enter GST No.">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Authorised Signatory:</label>
						      <input type="text" class="form-control" name="authorised_signatory" id="authorised_signatory" value="{{ $firm->authorised_signatory }}" placeholder="Please Enter Authorised Signatory" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Designation:</label>
						      <input type="text" class="form-control" name="designation" id="designation" value="{{ $firm->designation }}" placeholder="Please Enter Designation" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Name of Contact Person:</label>
						      <input type="text" class="form-control" name="contact_person" id="contact_person" value="{{ $firm->contact_person }}" placeholder="Please Enter Contact Person" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>Certified:</label> 
						      <input type="text" class="form-control" name="certified" id="certified" value="{{ $firm->certified }}" placeholder="Please Enter Certified" >
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
<script>
function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
</script>
<!-- END CONTENT -->
@endsection