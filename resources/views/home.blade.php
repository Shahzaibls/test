@extends('layouts.app')

@section('content')

<?php 
// echo '<pre>'; print_r($posts); echo '</pre>'; 
// exit;
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <!-- add script -->

                    <div class="container">

                      <div class="row">
                        <div class="col-md-10">
                            <h2> Post </h2>
                        </div>
                        <div class="col-md-2"> 
                            <a href="{{ url('upload-post') }}" class="btn btn-info float-right">New Post</a>
                        </div>
                      </div>
                      <br>
                      @if(count($posts) > 0)
                      @foreach ($posts as $post)
                      <hr>
                      <div class="well">
                          <div class="media">
                            <a class="pull-left" href="">
                              @if($post->post_image)
                                <img class="media-object" src="{{ url($post->post_image) }}" height="150" width="150">
                              @else  
                                <img class="media-object" src="/images/placeholder.png" height="150" width="150">
                              @endif 

                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <div class="media-body">
                              <span><h4 class="media-heading">{{ $post->title }} <span>({{ $post->user->name }})</span>
                              @if(auth()->user()->id == $post->user_id )
                              <a href="{{ url('edit-post') }}/{{ $post->id }}" class="btn btn-info btn-sm float-right">Edit Post</a>
                              <a href="{{ url('delete-post') }}/{{ $post->id }}" class="btn btn-danger btn-sm float-right">Delete Post</a>
                              @endif
                            </h4>
                          </span>
                              <!-- <p class="text-right">{{ $post->user->name }}</p> -->
                              <p>{{ $post->body }}</p>
                           </div>
                        </div>
                        <div class="row">
                             <div class="col-md-2"></div>
                             <div class="col-md-10">
                               <span><i class="glyphicon glyphicon-calendar"></i> {{ $post->created_at->diffforHumans() }} </span>&nbsp;&nbsp;&nbsp;
                                <span><i class="glyphicon glyphicon-comment"></i><a href="{{ url('comment') }}/{{ $post->id }}" class="btn btn-link btn-sm">Comment</a></span>
                             </div>
                           </div>
                      </div>

                    <!-- comment portion -->
                    <div class="container">
                        <h2> Comments </h2>
                      <div class="well">
                          <div class="media">
                            <div class="media-body">
                            @if (count($post->comments) > 0)
                            @foreach ($post->comments as $comment)
                              <div class="row">
                                 <div class="col-md-5">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ $comment->comment }} </p>
                                 </div>
                                 <div class="col-md-2">
                                    <span>{{ $comment->user->name }}</span>
                                 </div>
                                 <div class="col-md-3">
                                   <span><i class="glyphicon glyphicon-calendar"></i> &nbsp;&nbsp;&nbsp;&nbsp;{{ $comment->created_at->diffforHumans() }} </span>
                                 </div>
                                 <div class="col-md-2">
                                  @if(auth()->user()->id == $comment->user_id )
                                    <span><i class="glyphicon glyphicon-comment"></i><a href="{{ url('delete-comment') }}/{{ $comment->id }}" class="btn btn-danger btn-sm">Delete</a>
                                    </span>
                                  @endif
                                 </div>
                              </div>
                            @endforeach
                            @else
                            <div class="row">
                                 <div class="col-md-12">
                                    <center><p>Comment not found</p></center>
                                 </div>
                            </div>
                            @endif

                           </div>
                        </div>
                      </div>
                    </div>
                    <!-- end comment script -->
                      <br>
                      @endforeach
                      @else
                      <div class="row">
                           <div class="col-md-12">
                              <center><p>Post not found</p></center>
                           </div>
                      </div>
                      @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
