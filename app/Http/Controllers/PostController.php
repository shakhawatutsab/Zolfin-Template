<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\Post;

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
        return view('admin.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        DB::table('posts')->truncate();
        echo "All data has been deleted";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $post_id =20;
        DB::table("posts")
        ->where('id',$post_id)
        ->delete();
        echo 'data has been deleted';
    }
}
