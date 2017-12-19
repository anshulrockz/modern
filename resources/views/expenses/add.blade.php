@extends('layouts.app')
@section('content')
<link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-title">
    <h3>Expenses</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/expenses')}}">Expenses</a></li>
            <li class="active">Add</li>
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
                    <h4 class="panel-title">Add Expense</h4>
                </div>
                <div class="panel-body">
		    		<form class="form-custom" method="post" action="{{route('expenses.store')}}">
		                <div class="form-body row">
		                    {{ csrf_field() }}
		                    <div class="form-group col-md-6">
						      <label>Voucher no.</label>
						      <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ old('voucher_no') }}" placeholder="Please Enter Voucher no." >
						    </div>
						    <div class="form-group col-md-6">
							 <label>*Voucher Date:</label>
							 <div class="input-group date">
							   <input type="text" name="voucher_date" id="voucher_date" value="{{ old('voucher_date') }}" placeholder="Please Enter Voucher Date" class="form-control" required=""><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							 </div>
							</div>
						    <div class="form-group col-md-6">
						      <label>Comment:</label>
						      <input type="text" class="form-control" name="comment1" id="comment1" value="{{ old('comment1') }}" placeholder="Please Enter Comment" >
						    </div>
						    <div class="form-group col-md-6">
						      <label>*Expense Account:</label>
						      <select name="expense_account" id="expense_account" class="form-control" required="">
							     <option value="">Select</option>
							     @foreach($exaccount as $exaccount )
							     <option value="{{ $exaccount->id }}">{{ $exaccount->name }}</option>
							     @endforeach
							 </select>
							</div>
						    <div class="form-group col-md-6">
						      <label>*Expense Amount:</label>
						      <input type="number" class="form-control" name="expense_amount" id="expense_amount" value="{{ old('expense_amount') }}" placeholder="Please Enter Expense Amount" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>Comment:</label>
						      <input type="text" class="form-control" name="comment2" id="comment2" value="{{ old('commen2t') }}" placeholder="Please Enter Comment" >
						    </div>
						    <div class="form-group col-md-6">
						    	<label>*Paying Account:</label>
							    <select name="paying_account" id="paying_account" class="form-control" required="">
								     <option value="">Select</option>
								     @foreach($account as $account )
								     <option value="{{ $account->id }}">{{ $account->name }}</option>
								     @endforeach
								</select>
							</div>
						    <div class="form-group col-md-6">
						      <label>*Paying Amount:</label>
						      <input type="number" class="form-control" name="paying_amount" id="paying_amount" value="{{ old('paying_amount') }}" placeholder="Please Enter paying Amount" required="">
						    </div>
						    <div class="form-group col-md-6">
						      <label>Comment:</label>
						      <input type="text" class="form-control" name="comment3" id="comment3" value="{{ old('comment3') }}" placeholder="Please Enter Comment" >
						    </div>
						    <div class="form-group col-md-6">
						    	<label>*RCM Nature:</label>
							    <select name="rcm" id="rcm" class="form-control">
								     <option>Select</option>
								     <option value="RCM">RCM</option>
								</select>
							</div>
						    <div class="form-group col-md-6">
						      <label>Expense Amount:</label>
						      <input type="number" class="form-control" name="final_expense_amount" id="final_expense_amount" value="{{ old('expense_amount') }}" placeholder="Expense Amount" disabled="disabled">
						    </div>
						    <div class="form-group col-md-6">
						      <label>Paying Amount:</label>
						      <input type="number" class="form-control" name="final_paying_amount" id="final_paying_amount" value="{{ old('paying_amount') }}" placeholder="Paying Amount" disabled="disabled">
						    </div>
		                </div>
		                <div class="form-actions">
		                    <button type="submit" class="btn btn-info">Save</button>
		                    <button type="button" class="btn default" onclick="location.href = '{{url('/expenses')}}';">Cancel</button>
		                </div>
		            </form>
		        </div>
		    </div>
    	</div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type='text/javascript'>
$(function(){
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0); 
    $('.date').datepicker({
        calendarWeeks: true,
        todayHighlight: true,
        autoclose: true,
        format: "dd-MM-yyyy",//" yyyy-mm-d",
        //startDate: today
    });
});
</script>
<!-- END CONTENT -->
@endsection