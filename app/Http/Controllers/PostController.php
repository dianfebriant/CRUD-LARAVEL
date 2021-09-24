<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use App\Models\Category;
use Carbon\Carbon;

class PostController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::latest()->paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin/post/create');

        return view('admin/post/create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'body'   => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
           
        ]);
        $post = new Post();
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->slug     = \Str::slug(request('title'));
        $post->excerpt = $request->input('excerpt');
        $post->body = $request->input('body');
        
        
        //upload image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/posts/', $filename);
            $post->image = $filename;
        }
        $post->save();
            //redirect dengan pesan sukses
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
       
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body'   => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
           
        ]);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        if($request->hasFile('image')){
            $post->delete_image();
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/posts/', $filename);
            $post->image = $filename;
        }
        $post->save();
            //redirect dengan pesan sukses
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
        
        
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        
        $post->delete_image();
        $post->delete();
        return redirect('posts')->with('success', 'Hapus Data Berhasil');
    }
}
