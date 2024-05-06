<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        $comments = Comment::all();
        $post_id = $posts[0]->id;
        $user_id = $posts[0]->user_id;
        $my_user = User::find($user_id);
        $response = array();
        for ($x = 0; $x < count($posts); $x++) {
            $post = $posts[$x];
            $user = User::find($post->user_id);
            $post_comments = Comment::where('post_id', $post->id)->get();   
            error_log($post_comments);
            array_push($response, array("id" => $post->id, 
                                        "first_name" => $user->first_name,
                                        "last_name" => $user->last_name,
                                        "content" => $post->content,
                                        "comments" => $post_comments));
        };
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
