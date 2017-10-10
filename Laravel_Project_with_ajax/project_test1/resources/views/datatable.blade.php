@extends('main')

@section('title', '| Data ')

@section('datatable_css')

	<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	
			<table id="myTable" class="display" width="100%" cellspacing="0">
		        <thead>
		            <tr>
		                <th>Title</th>
		                <th>Platform</th>
		                <th>Username</th>
		                <th>Business name</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach( $coms as $com )
		        	<tr>
		        		<td>{{ $com->id }}</td>
		        		<td>{{ $com->title }}</td>
		        		<td>{{ $com->status }}</td>
		        		<td>{{ $com->updated_at }}</td>
		        	</tr>
		        	@endforeach
		        </tbody>
		        <tfoot>
		            <tr>
		            	<th>Title</th>
		                <th>Platform</th>
		                <th>Username</th>
		                <th>Business name</th>              
		            </tr>
		        </tfoot>
		    </table>
    	</div>
    </div>

@endsection

@section('myTable_js')
<script>

	$(document).ready(function(){
    $('#myTable').DataTable();
});

</script>
@endsection

@section('datatable_js')

	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

@endsection

{{-- @section('jquery_cdn')
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@endsection --}}