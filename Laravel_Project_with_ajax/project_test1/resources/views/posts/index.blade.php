@extends('main')

@section('title', '| All Posts')

@section('content')
	
	<div class="row">
		 <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

		 	@foreach( $posts as $post )
		 	<div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->body }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                    <a href="{{ url('/posts/edit/'.$post->id) }}" class="btn" style="background-color: #e7e7e7;">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>



                    <form action="{{ url('/posts/delete/'.$post->id) }}" method="POST" style="display: inline-block">
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
            </div>

                <hr>
            @endforeach
            <ul class="pager custom-right">
                    <li class="next custom-right">
                        <a href="#">Older Posts &rarr;</a>
                        <a href="posts/create">Create Post &rarr;</a>
                    </li>
            </ul>

		 </div>
	</div>

@endsection