@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Brands</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/brands')}}">Brands</a></li>
            <li class="active">{{ $brand->name }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">View brand</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                    	<tbody>
						  	<tr>
						      <th>Name</th>
						      <td>{{ $brand->name }}</td>
						    </tr>
						    <tr>
						      <th>Description</th>
						      <td>{{ $brand->description }}</td>
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