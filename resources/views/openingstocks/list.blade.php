@extends('layouts.app')
@section('content')
<link href="{{asset('assets/plugins/datatables/css/jquery.datatables.css')}}" rel="stylesheet" type="text/css"/>    
<link href="{{asset('assets/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-title">
    <h3>Opening Stocks</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Opening Stocks</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-white">
                <div class="panel-heading clearfix">
		                <h3 class="panel-title">all opening stocks</h3>
		                <div class="panel-control">
                        	<a href="{{ url('/opening-stocks/create') }}">
                        	<button class="btn btn-info btn-addon m-b-sm btn-sm"><i class="fa fa-plus"></i> Add New</button>
                        	</a>
                        </div>
                </div>
                
		            @include('layouts.flashmessage')
                    <div class="panel-body">
                    	<div class="table-responsive">
                        <table class="display table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Barcode</th>
                                    <th>Expiry Date</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th style="width:230px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($openingstock as $openingstock)
                                <tr>
                                    <td>{{ $openingstock->id }}</td>
                                    <td>{{ $openingstock->name }}</td>
                                    <td>{{ $openingstock->description }}</td>
                                    <td>{{ $openingstock->description }}</td>
                                    <td>{{ $openingstock->description }}</td>
                                    <td>
                                        <a href="{{ url('/openingstocks/'.$openingstock->id)}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="{{ url('/openingstocks/'.$openingstock->id.'/edit')}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form style="display: inline;" method="post" action="{{route('openingstocks.destroy',$openingstock->id)}}">
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
</div>
<script src="{{asset('assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script>
	$(document).ready(function(){
	    $('#dataTable').DataTable({
			"ordering": false
		});
	});
</script>
<!-- END CONTENT -->
@endsection