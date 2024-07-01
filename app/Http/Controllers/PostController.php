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
        $categories = Category::all();
        return view('admin.create-post',[
            'categories' => $categories,
            'title' => "Create new post"
        ]);
    }
    public function post(){

        $keyword = request('search');
        $title = "All Posts";

        $posts = Post::where('title','LIKE', '%'.$keyword.'%')
            ->orWhere('excerpt','LIKE', '%'.$keyword.'%')
            ->orWhere('content','LIKE', '%'.$keyword.'%')
            ->orderBy('id','asc')->paginate(5);

        return view('admin.posts',[
            'posts' => $posts,
            'keyword'=> $keyword,
            'title' => $title
       ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'title' =>'required',
            'thumbnail' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        $request['slug'] = implode( explode('-',$request->title));
        $request['user_id'] = auth()->user()->id;
        $request['views'] =0;

        Post::create( $request->all() );

        return redirect()->route('admin-posts')->with('message','Post published!');

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
            'cat' => $post-> category,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        dd($request->all());
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
