@extends('layout')

@section('title')
    {{$post->title}}
@endsection


@section('content')
   
        

    <div class="row bg-light my-4 ">

        <div class="col-md-6">
            <h2>Title: <span class="text-muted">{{$post->title}}</span></h2>
            <h5>Description: <span class="text-muted">{{$post->desc}}</span></h5>
            <p>Content: <span class="text-muted">{{$post->content}}</span></p>
            
        </div>

        <div class="col-md-6">
            <img  style="width:300px; height:300px" src="{{asset('posts_images/'.$post->img)}}" alt="" srcset="">
        </div>

            <a class="btn btn-primary m-2" href="{{route('posts')}}">Back</a>
            <a class="btn btn-secondary m-2" href="{{route('posts.edit',$post->id)}}">Edit</a>
            <a class="btn btn-danger m-2" href="">Delete</a>
    </div>
       

        
    
    

@endsection