@extends('main')

@section('title', '| Data Server Side ')

@section('datatable_css')

	<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection

@section('content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		
	
			<table id="myTable" class="display" width="100%" cellspacing="0">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Title</th>
		                <th>Platform-Ui</th>
		                <th>Business Name</th>
		            </tr>
		        </thead>
			        <tfoot>
				        <tr>
				                <th>ID</th>
				                <th>Title</th>
				                <th>Platform-Ui</th>
				                <th>Business Name</th>
				        </tr>
			        </tfoot>
		    </table>
    	</div>
    </div>

@endsection

@section('myTable_js')
<script>

	$(document).ready(function() {
    $('#myTable').DataTable({
	  "processing": true,
      "serverSide": true,
	  "paginate": true,
	  "ajax": "{{ url('jsonview') }}",
	  "deferRender": true,
	  "pagingType": "full_numbers",
	  "columnDefs": [ {
            "targets": 0,
            "data": null,
			"mRender": function ( data, type, full ) {
				//return data['creatives_url'];
				/*return 	'<div class="thumbnail" style="width: 250px;">'
							'<img src="'+data['creatives_url']+'" alt="..." width="100px" height="80px">'
							'<div class="caption">'
								'<h3>Thumbnail label</h3>'
								'<p>
								'+data['program_name']+'
								</p>'
							</div>'
	    				</div>';*/
				return data['id'];/*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				
				
					   
						
				 //return data['program_name'];
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		},{
            "targets": 1,
            "data": null,
			"mRender": function ( data, type, full ) {
				return data['title'];/*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		},{
            "targets": 2,
            "data": null,
			"mRender": function ( data, type, full ) {
				return data['status'];/*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		},{
            "targets": 3,
            "data": null,
			"mRender": function ( data, type, full ) {
				return data['updated_at'];/*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		} ]
    });
  });


</script>
@endsection

@section('datatable_js')

	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

@endsection