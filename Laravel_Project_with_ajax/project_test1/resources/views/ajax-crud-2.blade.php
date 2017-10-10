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
		      		<form data-toggle="validator" action="{{ route('items.store') }}" method="POST">
		      		{{ csrf_field() }}

		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Body:</label>
							<textarea name="body" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Post</button>
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
						<button class="btn btn-primary" value="{{$post->id}}" data-toggle="modal" data-target="#edit-modal"><span class="glyphicon glyphicon-edit"></span>Edit</button>
						<button class="btn btn-danger" value="{{$post->id}}" data-toggle="modal" data-target="#edit-modal"><span class="glyphicon glyphicon-trash"></span>Delete</button>
						
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>


		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Post Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">


                                <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="title" name="title" placeholder="Task" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Body</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="body" name="body" placeholder="Description" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="post_id" name="post_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
	</div>

@endsection