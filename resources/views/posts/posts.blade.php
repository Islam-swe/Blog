@extends('layout')

@section('title')
    All Posts
@endsection

@section('content')

    
      
    @foreach ($posts as $post)
    <div class="row bg-light my-4 border border-primary rounded py-4">
        
        <div class="col-md-6">
            <h2>Title: <span class="text-muted">{{$post->title}}</span></h2>
            <h5>Description: <span class="text-muted">{{$post->desc}}</span></h5>
            <p>Content: <span class="text-muted">{{ Str::substr($post->content, 0, 300).'...'}}
            <a href="{{route('posts.show',$post->id)}}">Read More</a></span></p>
            
        </div>

        <div class="col-md-6">
            <img class="rounded-circle border border-dark" style="width:300px; height:300px" src="{{asset('posts_images/'.$post->img)}}" alt="" srcset="">
        </div>

            <a class="btn btn-primary m-2" href="{{route('posts.show',$post->id)}}">Show</a>
            <a class="btn btn-secondary m-2" href="{{route('posts.edit',$post->id)}}">Edit</a>
            <a class="btn btn-danger m-2" href="{{route('posts.delete',$post->id)}}">Delete</a>
    </div>
        
        @endforeach

        {{$posts->render()}}
       
    

@endsection