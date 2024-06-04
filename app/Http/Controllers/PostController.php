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
        $posts = Post::paginate(10);

        return view('admin.posts',[
            'posts' => $posts
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
    public function edit()
    {
        $insert_post = DB::table('posts')->insert([
            'title'=> 'Hello World-3',
            'thumbnail'=> 'http://localhost:8000/assets/img/project-img-1.png',
            'excerpt' => 'this is excerpt',
            'content' =>'Chances are good that theres a cloud software as a service solution on the market           that      will your core back-office needs. Many of those products offer the potential not just to move your data and processes.',
            'user_id' =>'100',
            'views' =>'100',
            'slug' => 'Hello-World-3'
        ]);

        if($insert_post){
            return 'data has been inserted to database';
        }
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
