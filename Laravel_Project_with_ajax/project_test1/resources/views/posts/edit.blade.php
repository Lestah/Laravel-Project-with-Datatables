@extends('main')

@section('title', '| Edit ')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<form action="{{ url('/posts/update/'.$post->id) }}" method="POST">
		{{ csrf_field() }}
		
			<div class="form-group">
			    <label for="exampleInputEmail1">Title</label>
			    <input type="hidden" name="_method" value="PUT">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $post->title }}">
			</div>
			<div class="form-group">
			    <label for="exampleTextarea">Body</label>
			    <textarea class="form-control" name="body" rows="3">{{ $post->body }}</textarea>
  			</div>
  			<div class="form-group">
			    
			   <input type="submit" class="btn btn-success btn pull-right" value="update">
			   
  			</div>
  		</form>

		</div>
	</div>

	<div>
		
	</div>

@endsection