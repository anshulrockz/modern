@extends('layouts.app')
@section('content')
<link href="{{asset('assets/plugins/datatables/css/jquery.datatables.css')}}" rel="stylesheet" type="text/css"/>    
<link href="{{asset('assets/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-title">
    <h3>Taxes</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Taxes</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-white">
                <div class="panel-heading clearfix">
		                <h3 class="panel-title">all taxes</h3>
		                <div class="panel-control">
                            <a href="{{ url('/taxes/create') }}"><button class="btn btn-info btn-addon m-b-sm btn-sm"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                </div>
                
		            @include('layouts.flashmessage')
                    <div class="panel-body">
                    	<div class="table-responsive">
                        <table class="display table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Rate(%)</th>
                                    <th>Effective From</th>
                                    <th>Description</th>
                                    <th style="width:50px">Status</th>
                                    <th style="width:230px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach($tax as $tax)
                                <tr>
                                    <td>{{ $tax->id }}</td>
                                    <td>{{ $tax->name }}</td>
                                    <td>{{ $tax->rate }}</td>
                                    <td>{{ $tax->effective_from }}</td>
                                    <td>{{ $tax->description }}</td>
                                    <td>
                                    	@if($tax->is_active==1)
                                    		<span  class="stts btn btn-success btn-sm">Active</span>
                                    	@else
                                    		<span  class="stts btn btn-warning btn-sm">Deactive</span>
                                    	@endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/taxes/'.$tax->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="{{ url('/taxes/'.$tax->id.'/edit')}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form style="display: inline;" method="post" action="{{route('taxes.destroy',$tax->id)}}">
					                        {{ csrf_field() }}
					                        {{ method_field('DELETE') }}
					                        <button onclick="return confirm('Are you sure you want to Delete?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
					                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<script src="{{asset('assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script>
	$(document).ready(function(){
	    $('#dataTable').DataTable({
			"ordering": false
		});
	});
</script>
@endsection