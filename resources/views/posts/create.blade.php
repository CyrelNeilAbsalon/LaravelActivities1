@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">       
              <div class="card-header">NEW POST</div>
              <div class="card-body">
                
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
              
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title:') }}</label>

                      <div class="col-md-6">
                          <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autofocus>
                          
                          @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description:') }}</label>

                      <div class="col-md-6">
                          <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autofocus>
                          
                          @error('description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Post Image:') }}</label>
                      
                      <div class="col-md-6">
                        <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img">
                      </div>
                      @error('img')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-warning">
                              Submit
                          </button>
                      </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection