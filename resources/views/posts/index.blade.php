@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            @if(session('message'))
              <div class="alert alert-success">
                {{ session('message') }} 
              </div>  
            @endif
            
          <a class="btn btn-success pull-right" href="/posts/create">CREATE NEW POST</a>
            <br><br>
            <div class="card">       
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Title </th>
                            <th> Description </th>
                            <th>  </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                            <tr>
                              <td> {{ $post->id }} </td>
                              <td> {{ $post->title }} </td>
                              <td> {{ $post->description }} </td>
                              <td> <a  href="/posts/{{$post->id}}" class="btn btn-primary"> View </a> </td>
                              <td> <a  href="/posts/{{$post->id}}/edit" class="btn btn-warning"> Edit </a> </td>
                               <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                  @method("DELETE")
                                  @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection