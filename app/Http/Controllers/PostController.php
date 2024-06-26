<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function post(){

        $keyword = request('search');

        $posts = Post::where('title','LIKE', '%'.$keyword.'%')
            ->orWhere('excerpt','LIKE', '%'.$keyword.'%')
            ->orWhere('content','LIKE', '%'.$keyword.'%')
            ->paginate(10);

        return view('admin.posts',[
            'posts' => $posts,
            'keyword'=> $keyword
       ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $categories = Category::all();

        return view('admin.edit-post',[
            'post' =>$post,
            'categories' => $categories,
            'cat' => $post-> category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all() );

        return back()->with('message', 'post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Post $post)
    {
        $post->delete();

        return back()->with('message','Post remove successfully!');
    }
}
