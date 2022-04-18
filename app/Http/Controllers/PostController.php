<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $posts = Post::all();
        
        return view('pages.blog.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;

         //
         if($request->hasFile('image'))
         {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $file->move('uploads/blog/', $filename);
             $post->image = $filename;
         }
         //
        $post->status = $request->status == true ? '1' : '0';
        $post->save();
        
        return redirect()->back()->with('success', 'Post created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('pages.blog.edit', compact('post'));
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
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
       
          //
          if($request->hasFile('image'))
          {
              $destinationPath = 'uploads/blog/'.$post->image;
                if(File::exists($destinationPath))
                {
                    File::delete($destinationPath);
                }
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension();
              $filename = time().'.'.$extension;
              $file->move('uploads/blog/', $filename);
              $post->image = $filename;
          }
          //
          
        $post->status = $request->status == true ? '1' : '0';
        $post->update();
        
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $destinationPath = 'uploads/blog/'.$post->image;
        if(File::exists($destinationPath))
        {
            File::delete($destinationPath);
        }
        $post->delete();
        
        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}