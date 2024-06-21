<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postsArray = Post::all();

        return view('admin.posts.index', compact('postsArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($request->title);
        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


       /**
     * Display the specified resource. Senza dependency injection
     */
    // public function show(string $slug)
    // {
    //     $post = Post::where('slug', $slug)->first();
    //     if(!$post) {
    //         abort(404);
    //     }
    //     dd($post);
    //     return view('admin.posts.show', compact('id'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    { 
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $post->update($data);
        return redirect()->route('admin.posts.show', $post->slug)->with('message', 'post ' .$post->title. ' è stato modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message','post '.$post->title .' è stato cancellato');
    }
}
