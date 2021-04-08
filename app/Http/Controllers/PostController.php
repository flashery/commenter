<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $posts = Post::with('comments')->latest()->get();
            // dd($posts[0]->comments);
            $posts =  $posts->map(function ($post) {
                $post->comment_tree = [];
                $post->comment_tree =  $this->buildCommentTree($post->comments->toArray());
                unset($post->comments);
                return $post;
            });
            return response()->json($posts, 200);
        }
        return view('welcome');
    }

    private  function buildCommentTree(array $comments, $parentId = 0)
    {
        $branch = array();

        foreach ($comments as $comment) {
            if ($comment['parent_comment_id'] == $parentId) {
                $children = $this->buildCommentTree($comments, $comment['id']);
                if ($children) {
                    $comment['children'] = $children;
                }
                $branch[] = $comment;
            }
        }

        return $branch;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
