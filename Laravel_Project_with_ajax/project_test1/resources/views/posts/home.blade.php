@extends('main')

@section('title', '| Home')

@section('content')
	<div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
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
                    <!--<button type="button" class="btn btn-secondary"></button>-->
                    <a href="{{ url('/posts/edit/'.$post->id) }}" class="btn" style="background-color: #e7e7e7;">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
                    <button type="button" class="btn btn-secondary">Delete</button>
                </div>
                <hr>
                <!--<div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                        </h2>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Science has not yet mastered prophecy
                        </h2>
                        <h3 class="post-subtitle">
                            We predict too much for the next year and yet far too little for the next ten.
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Failure is not an option
                        </h2>
                        <h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
                </div>
                <hr>
                
                <ul class="pager custom-right">
                    <li class="next custom-right">
                        <a href="#">Older Posts &rarr;</a>
                        <a href="posts/create">Create Post &rarr;</a>
                    </li>
                </ul>-->
            </div>
        </div>
@endsection