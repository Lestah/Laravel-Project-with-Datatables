<?php if(isset($offers)){
?>
<script>
$(document).ready(function() {
    var table = $('#tbl').DataTable({
	  "processing": true,
      "serverSide": true,
	  "paginate": true,
	  "ajax": "{{ url('admin/allposts') }}",
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
				return /*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				
				
					   
						
				 //return data['program_name'];
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		},{
            "targets": 1,
            "data": null,
			"mRender": function ( data, type, full ) {
				return /*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		},{
            "targets": 2,
            "data": null,
			"mRender": function ( data, type, full ) {
				return /*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		},{
            "targets": 3,
            "data": null,
			"mRender": function ( data, type, full ) {
				return /*'<img src="'+data['creatives_url']+'" alt="no picture available" width="100px" height="80px"></br>'+data['program_name'];*/
				 /*return data['program_name']+','+data['creatives_url'];*/
			}
		} ]
    });
  });
</script>
<?php
} ?>