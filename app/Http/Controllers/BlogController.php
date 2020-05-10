<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Blog::all();
        return view('post.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'title'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

       if($request->hasfile('cover_image'))    
        {
            $filenamewithExt=$request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename=pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get Extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else
        {
            $filenameToStore='noimage.jpg';     
        }

        $post=new Blog();
        $post->title=$request->input('title');
        $post->description=$request->input('description');
        $post->cover_image=$fileNameToStore;
        //print_r($post);die();
        $post->save();
        return redirect()->back()->with('success','post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Blog::find($id);
        return view('post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Blog::findorfail($id);
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);

        if($request->hasfile('cover_image'))    
        {
            $filenamewithExt=$request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename=pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get Extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }

        $post=Blog::findorfail($id);
        $post->title=$request->input('title');
        $post->description=$request->input('description');
        if($request->hasfile('cover_image')){
            $post->cover_image=$fileNameToStore;
        }
        //print_r($post);die();
        $post->save();
        return redirect('post')->with('success','post Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Blog::findorfail($id);

        if($post->cover_image!='noimage.jpg')
        {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('post')->with('Success','deleted Successfully');
    }
}
