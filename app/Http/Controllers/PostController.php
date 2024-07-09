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
    public function index(){

        $keyword = request('search');
        $title = "All Posts";

        $posts = Post::where('title','LIKE', '%'.$keyword.'%')
            ->orWhere('excerpt','LIKE', '%'.$keyword.'%')
            ->orWhere('content','LIKE', '%'.$keyword.'%')
            ->orderBy('id','desc')->paginate(10);

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
        dd($request->all());
        $request -> validate([
            'title' =>'required',
            'thumbnail' => 'required|image|mimes:jpg,bmp,png',
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->slug = implode( explode('-',$request->title)).'-'.time();
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;

        $image_name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs('public/image', $image_name);

        $post->thumbnail = $image_name;
        $post->user_id = auth()->user()->id;
        $post->views = 0;
        $post->category_id = $request->category_id;

        $post->save();

        return redirect()->route('posts.index')->with('message','Post published!');

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
        $post->update($request->all() );

        return back()->with('message', 'post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('message','Post remove successfully!');
    }
}
