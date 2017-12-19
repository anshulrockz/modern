@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Bank Details</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('bank-details')}}">Bank Details</a></li>
            <li class="active">{{ $bank->name }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">view Bank Details</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                    	<tbody>
						  	<tr>
						      <th>Name</th>
						      <td>{{ $bank->name }}</td>
						    </tr>
						    <tr>
						      <th>Payee</th>
						      <td>{{ $bank->payee }}</td>
						    </tr>
						    <tr>
						      <th>Account Number</th>
						      <td>{{ $bank->account_no }}</td>
						    </tr>
						    <tr>
						      <th>IFSC</th>
						      <td>{{ $bank->ifsc }}</td>
						    </tr>
						    <tr>
						      <th>Description</th>
						      <td>{{ $bank->bank_branch }}</td>
						    </tr>
						  </tbody>
						</table>
                    </div>
                </div>
            </div>               
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<!-- END CONTENT -->
@endsection