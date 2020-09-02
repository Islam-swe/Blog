@extends('layout')


@section('title')
    Create Post
@endsection

@section('content')
    <div class="container">

    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <input name="title" value="{{old('title')}}" type="text" class="form-control"  placeholder="Title">
            </div>
                @if ($errors->first('title'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('title')}}</strong>
                    </div>
                    
                @endif
       
            <div class="form-group">
                <input name="desc" value="{{old('desc')}}" type="text" class="form-control"  placeholder="Description">
            </div>
                 @if ($errors->first('desc'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('desc')}}</strong>
                    </div>
                    
                @endif

            <div class="form-group">
              <textarea name="content" class="form-control"  placeholder="Content" rows="3">{{old('content')}}</textarea>
            </div>
                @if ($errors->first('content'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('content')}}</strong>
                    </div>
                    
                @endif


            <div class="form-group">
              <label for="">Upload Image</label>
              <input name="img" type="file" class="form-control-file"> 
            </div>
                @if ($errors->first('img'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('img')}}</strong>
                    </div>
                    
                @endif

            <button class="btn btn-primary" type="submit">Create</button>
        </form> 
    </div>
  

@endsection