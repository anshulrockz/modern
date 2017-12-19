@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Accounts</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/accounts')}}">Accounts</a></li>
            <li class="active">{{ $account->name }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">{{ $account->name }}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                    	<tbody>
						  	<tr>
						      <th>Name</th>
						      <td>{{ $account->name }}</td>
						    </tr>
						    <tr>
						      <th>GST %</th>
						      <td>{{ $account->gst }}</td>
						    </tr>
						    <tr>
						      <th>HSN Code</th>
						      <td>{{ $account->hsn_code }}</td>
						    </tr>
						    <tr>
						      <th>Parent Acount Name</th>
						      <td>{{ $account->parent_account_number }}</td>
						    </tr>
						    <tr>
						      <th>ITC Eligibility</th>
						      <td>{{ $account->itc_eligibility }}</td>
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