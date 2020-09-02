@extends('layout')


@section('title')
    Edit: {{$post->title}}
@endsection

@section('content')
    <div class="container">

    <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-md-6">
    <div class="form-group">
                <input name="title" value="{{old('title') ?? $post->title}}" type="text" class="form-control"  placeholder="Title">
            </div>
                @if ($errors->first('title'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('title')}}</strong>
                    </div>
                    
                @endif
       
            <div class="form-group">
                <input name="desc" value="{{old('desc') ?? $post->desc}}" type="text" class="form-control"  placeholder="Description">
            </div>
                 @if ($errors->first('desc'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('desc')}}</strong>
                    </div>
                    
                @endif

            <div class="form-group">
              <textarea name="content" class="form-control"  placeholder="Content" rows="15">{{old('content') ?? $post->content}}</textarea>
            </div>
                @if ($errors->first('content'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('content')}}</strong>
                    </div>
                    
                @endif

            </div>
            <div class="col-md-6">
                <img class="w-100" src="{{asset('posts_images/'.$post->img)}}" alt="">
                <div class="form-group">
                    <label for="">Update Image</label>
                    <input name="img" type="file" class="form-control-file"> 
                </div>
            @if ($errors->first('img'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{$errors->first('img')}}</strong>
                </div>
                
            @endif
            </div>
        </div>
            
        

            

            <button class="btn btn-primary" type="submit">Update</button>
        </form> 
    </div>
  

@endsection