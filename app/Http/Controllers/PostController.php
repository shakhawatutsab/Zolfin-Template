<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_posts = DB::table('posts')->get();
        return view('pages.blog', [
            'posts' => $all_posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function post(){
        $all_posts = DB::table('posts')->get();

        return view('pages.blog',[
            'posts' => $all_posts
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
    public function edit(string $id)
    {
        $insert_post = DB::table('posts')->insert([
            'title'=> 'Hello World',
            'thumbnail'=> 'http://localhost:8000/assets/img/project-img-2.png',
            'excerpt' => 'this is excerpt',
            'content' =>'Chances are good that there’s a cloud software as a service solution on the market           that      will your core back-office needs. Many of those products offer the potential not just to move your data and processes.',
            'time' =>'2024-05-20',
            'user_id' =>'100',
            'slug' => 'Hello-world'
        ]);

        if($insert_post){
            return 'data has been inserted to database';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('posts')->truncate();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post_id =20;
        DB::table("posts")
        ->where('id',$post_id)
        ->delete();
        echo 'data has been deleted';
    }
}
