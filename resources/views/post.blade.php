@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>

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
                        <h2>Upload Post</h2>
                      </div>
                   
                      <div class="card-body">
                          <form method="POST" enctype="multipart/form-data" id="upload-post" action="{{ url('save') }}" >

                            @csrf
                                     
                              <div class="row">
                   
                                  <div class="col-md-12">

                                    <div class="form-group">
                                          <input class="form-control" type="text" name="title" placeholder="Enter title" id="title" value="{{ old('title') }}">
                                      @error('title')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror
                                      </div>

                                      <div class="form-group">
                                          <!-- <input class="form-control" type="text" name="body" placeholder="Enter Details" id="body" value="{{ old('body') }}"> -->

                                          <textarea type="text" rows="10" cols="100" name="body" class="form-control" id="body" style="resize:none" placeholder="Enter Details">{{ old('body')}}</textarea>

                                      @error('body')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror
                                      </div>

                                      <div class="form-group">
                                          <input type="file" name="image" placeholder="Choose image" id="image" value=" {{ old('image') }}">
                                      @error('image')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror
                                      </div>
                                  </div>
                                     
                                  <div class="col-md-12">

                                      <a href="{{ url('/home') }}" class="btn btn-link" >Back</a>


                                      <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>

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
