<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function add(Request $request, $post_id)
    {
        if (Auth::check()) {
            $comment = new Comment();
            $comment->post_id = $post_id;
            $comment->user_id = Auth::user()->id;
            $comment->content = $request->input('content');
            $comment->save();

            return redirect()->route('post_single',['id'=>$post_id]);
        }

        return Response::create('', 500);
    }

    public function delete($comment_id)
    {
        if (Auth::check()) {
            $comment = Comment::with(['post', 'author'])->where('id', $comment_id)->first();
            if($comment !== null) {
                $post_id = $comment->post->id;
                if ($comment->author->id === Auth::user()->id) {
                    $comment->delete();
                }

                return redirect()->route('post_single',['id'=>$post_id]);
            }
        }

        return Response::create('Bad Data!', 500);
    }
}