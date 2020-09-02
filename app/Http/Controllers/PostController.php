<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //func view the create form  
    public function create()
    {
        return view('posts/create');
    }
    //func store in db
    public function store(Request $request)
    {
        //validation
        $request->validate
        (
            [
                'title'=>'required|string|max:100',
                'desc'=>'required|string',
                'content'=>'required|string',
                'img'=>'nullable|image|mimes:jpg,png,jpeg'
            ]
        );

        //create unique name for image and upload it
        $imgName=$request->img->getClientOriginalName();
        $imgName=uniqid().time().$imgName;
        $request->img->move(public_path('posts_images'),$imgName);

        //store data form in db
        $post=new Post();
        $post->title=$request->title;
        $post->desc=$request->desc;
        $post->content=$request->content;
        $post->img=$imgName;
        $post->save();


        return redirect(route('posts'));
    }


    //display all posts
    public function posts()
    {
        $posts=Post::paginate(3);
        
        return view('posts/posts',compact('posts'));   
    }
    //show one post detail
    public function show($id)
    {
        $post=Post::findOrFail($id);

        return view('posts/show',compact('post'));
    }


    //edit
    public function edit($id)
    {
        $post=Post::findOrFail($id);

        return view('posts/edit',compact('post'));
    }
    
    //update
    function update(Request $request,$id)
    {
        //validation
        $request->validate
        (
            [
                'title'=>'required|string|max:100',
                'desc'=>'required|string|max:100',
                'content'=>'required|string',
                'img'=>'nullable|image|mimes:jpg,jpeg,jif,png|max:100'
            ]
        );
        
        $post=Post::findOrFail($id);
        
        if($request->hasFile('img'))
        {
            if($post->img!==null)
            {
                unlink(public_path('posts_images/'.$post->img));
            }
            
            $imgName=$request->img->getClientOriginalName();
            $imgName=uniqid().time().$imgName;
            $request->img->move(public_path('posts_images/'),$imgName);
            $post->img=$imgName;

        }
        $post->title=$request->title;
        $post->desc=$request->desc;
        $post->content=$request->content;
        $post->save();

        //redirect(route('posts.edit',$post->id));
        return back();
    }

    //delete
    public function delete($id)
    {
        $post=Post::findOrFail($id);
        if($post->img!==null)
        {
            unlink(public_path('posts_images/'.$post->img));
        }
        $post->delete(); 

        return redirect(route('posts')); 
    }


}
