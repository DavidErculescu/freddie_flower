<?php

namespace App\Http\Controllers;


use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.list', [
            'posts' => $posts
        ]);
    }

    public function single($id)
    {
        $post = Post::with(['comments', 'author'])->where('id', $id)->first();

        return view('posts/single', [
            'post' => $post
        ]);
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            $post = new Post();
            $post->user_id = Auth::user()->id;
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();

            return redirect()->route('post_single',['id'=>$post->id]);
        }

        return Response::create('', 500);
    }

    public function delete($post_id)
    {
        if (Auth::check()) {
            $post = Post::with(['author'])->where('id', $post_id)->first();
            $comments = Comment::all()->where('post_id', $post->id);
            if($post !== null) {
                if ($post->author->id === Auth::user()->id) {
                    foreach ($comments as $comment){
                        $comment->delete();
                    }
                    $post->delete();
                }
                return redirect()->route('post_list');
            }
        }
        return Response::create('Bad Data!', 500);
    }

    public function edit(Request $request, $post_id)
    {
        if (Auth::check()) {
            $post = Post::with(['comments', 'author'])->where('id', $post_id)->first();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->update();

            return redirect()->route('post_single',['id'=>$post->id]);
        }

        return Response::create('', 500);
    }

    public function form($post_id = null)
    {
        return view('posts.form', [
            'post' => Post::all()->where('id', $post_id)->first()
        ]);
    }
}
