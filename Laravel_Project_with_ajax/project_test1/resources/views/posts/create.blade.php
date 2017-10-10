@extends('main')

@section('title', '| Create New Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<form action="{{ route('insert') }}" method="POST">
		{{ csrf_field() }}
		
			<div class="form-group">
			    <label for="exampleInputEmail1">Title</label>
			    <input type="text" class="form-control" name="title" placeholder="Enter title">
			</div>
			<div class="form-group">
			    <label for="exampleTextarea">Body</label>
			    <textarea class="form-control" name="body" rows="3"></textarea>
  			</div>
  			<div class="form-group">
			    
			    <input type="submit" class="btn btn-success btn pull-right" value="post">
  			</div>
  		</form>

		</div>
	</div>

@endsection