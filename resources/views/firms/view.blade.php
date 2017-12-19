@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Firms</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/firms')}}">Firms</a></li>
            <li class="active">{{ $firm->name }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">view firm</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                    	<tbody>
						  	<tr>
						      <th>Name</th>
						      <td>{{ $firm->name }}</td>
						    </tr>
						    <tr>
						      <th>Email</th>
						      <td>{{ $firm->email }}</td>
						    </tr>
						    <tr>
						      <th>Mobile</th>
						      <td>{{ $firm->mobile }}</td>
						    </tr>
						    <tr>
						      <th>Website</th>
						      <td>{{ $firm->website}}</td>
						    </tr>
						    <tr>
						      <th>Landline</th>
						      <td>{{ $firm->landline }}</td>
						    </tr>
						    <tr>
						      <th>State</th>
						      <td>{{ $firm->state }}</td>
						    </tr>
						    <tr>
						      <th>City</th>
						      <td>{{ $firm->city}}</td>
						    </tr>
						    <tr>
						      <th>Address</th>
						      <td>{{ $firm->address }}</td>
						    </tr>
						    <tr>
						      <th>Pin Code</th>
						      <td>{{ $firm->pin_code }}</td>
						    </tr>
						    <tr>
						      <th>Permanent Account Number(PAN):</th>
						      <td>{{ $firm->pan }}</td>
						    </tr>
						    <tr>
						      <th>TDS Account Number(TAN)</th>
						      <td>{{ $firm->tan }}</td>
						    </tr>
						    <tr>
						      <th>Corporate Identity Number(CIN)</th>
						      <td>{{ $firm->cin }}</td>
						    </tr>
						    <tr>
						      <th>GSTIN Registration Status:</th>
						      <td>{{ $firm->gstin }}</td>
						    </tr>
						    <tr>
						      <th>GST No.</th>
						      <td>{{ $firm->gst }}</td>
						    </tr>
						    <tr>
						      <th>Authorised Signatory</th>
						      <td>{{ $firm->authorised_signatory }}</td>
						    </tr>
						    <tr>
						      <th>Designation</th>
						      <td>{{ $firm->designation }}</td>
						    </tr>
						    <tr>
						      <th>Name of Contact Person</th>
						      <td>{{ $firm->contact_person }}</td>
						    </tr>
						    <tr>
						      <th>Certified</th>
						      <td>{{ $firm->certified }}</td>
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