@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Comment') }}</div>

                <div class="card-body">
                    
                    <!-- {{ __('You are logged in!') }} -->
                    <!-- add script -->
                    <div class="container mt-5">
 
                    @if(session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                    @endif
                   
                    <div class="card">
                   
                      <div class="card-header text-center font-weight-bold">
                        <h2>Upload Comment</h2>
                      </div>
                   
                      <div class="card-body">
                          <form method="POST" id="upload-post" action="{{ url('comment_save') }}" >

                            @csrf
                                     
                              <div class="row">
                   
                                  <div class="col-md-12">

                                  	<input type="hidden" name="post_id" value="{{ $postid }}">

                                    <div class="form-group">
                                          <textarea type="text" rows="10" cols="100" name="comment" class="form-control" id="comment" style="resize:none"></textarea>
                                      @error('comment')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror
                                      </div>

                                  </div>
                                     
                                  <div class="col-md-12">

                                      <a href="{{ url('/home') }}" class="btn btn-link" >Back</a>

                                      <button type="submit" class="btn btn-primary float-right" id="submit">Comment</button>

                                  </div>
                              </div>     
                          </form>
                   
                      </div>
                   
                    </div>
                   
                  </div>  
                    <!-- end script -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
