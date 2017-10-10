@extends('main')

@section('title', '| ajax-crud-2')

@section('content')

	<div class="container">


		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>Laravel Ajax CRUD Example</h2>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Create Item
				</button>
		        </div>
		    </div>
		</div>

	    <!-- Create Item Modal -->

		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
		      </div>
		      <div class="modal-body">
		      		<form data-toggle="validator" action="{{--{{ route('items.store') }}--}}" method="POST">
		      		{{ csrf_field() }}
		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Description:</label>
							<textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>
		      		</form>
		      </div>
		    </div>
		  </div>
		</div>

		<table class="table table-bordered">
			<thead>
			    <tr>
				<th>Title</th>
				<th>Body</th>
				<th width="200px">Action</th>
			    </tr>
			</thead>
			<tbody>
				@foreach( $posts as $post )
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->body }}</td>
						<td style="width: 250px">
						<button class="edit-modal btn btn-primary" onclick="fun_view('{{ $post->id }}','{{ $post->title }}','{{ $post->body }}')" data-toggle="modal" data-target="#edit-item"><span class="glyphicon glyphicon-edit"></span>Edit</button>
						<!--<button class="edit-modal btn btn-primary" data-id="{{--{{ $post->id }}--}}" data-title="{{--{{ $post->title }}--}}" data-body="{{--{{ $post->body }}--}}" data-toggle="modal" data-target="#edit-item"><span class="glyphicon glyphicon-edit"></span>Edit</button>-->
						<button class="delete-modal btn btn-danger" data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-body="{{ $post->body }}" style=""><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#create-item"></span>Delete</button>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>


		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>
		      <div class="modal-body">
		      		<!--<form class="form-horizonta" data-toggle="validator" action="/item-ajax/14" method="put">-->
		      		<form action="" method="POST">
		      		{{ csrf_field() }}
		      			<div class="form-group">
		      				<input type="hidden" name="_method" value="PUT">
			    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<label class="control-label" for="title">ID:</label>
							<input type="text" name="edit_id" class="form-control" id="edit_id" value="">
							
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<!--<input type="text" name="title" class="form-control" id="t" data-error="Please enter title." value="{{--{{ $post->title }}--}}" required />-->
							<input type="text" class="form-control" id="edit_tile" name="edit_title" value="">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="Body">Body:</label>
							<textarea name="description" class="form-control" id="edit_body" name="edit_body" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success crud-submit-edit">Update</button>
						</div>
		      		</form>
		      		<!--<div class="deleteContent">
		      			Are you sure you want to delete <span class="title"></span>
		      			<span class="hidden id"></span>
		      			
		      		</div>
		      		<div class="modal-footer">
		      			<button type="button" class="btn actionBtn" data-dismiss="modal">
		      				<span id="footer_action_button" class="glyphicon"></span>
		      			</button>
		      			<button type="button" class="btn btn-warning" data-dismiss="modal">
		      				<span class="glyphicon glyphicon-remove"></span> Close
		      			</button>
		      		</div>-->
		      </div>
		    </div>
		  </div>
		</div>
	</div>

<script>

function fun_view(id, title, body)
{
    var id = id;
    var title = title;
    var body = body;
    alert(id);
    alert(title);
    alert(body);

    document.getElementById("view_id").innerHTML = id;
    document.getElementById("view_title").innerHTML = title;
    document.getElementById("view_body").innerHTML = body;

    document.getElementById("edit_id").value = id;
    document.getElementById("edit_title").value = title;
    document.getElementById("edit_body").value = body;

    return  { id: id, title: title, body: body }
}

</script>

@endsection

