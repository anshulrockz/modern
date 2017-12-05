@extends('layouts.app')
@section('content')
<div class="page-title">
    <h3>Units</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/units')}}">Units</a></li>
            <li class="active">{{ $unit->name }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">view unit</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                    	<tbody>
						  	<tr>
						      <th>Name</th>
						      <td>{{ $unit->name }}</td>
						    </tr>
						    <tr>
						      <th>Description</th>
						      <td>{{ $unit->description }}</td>
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