<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // dd(Post::with('user')->get());
        // dd(Post::all());
        return view('home', ['posts' => Post::with('user')->get()]);
    }

    public function showPost($id)
    {
        return view('show-post', ['post' => Post::find($id)]);
    }

    public function createPost(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'text' => $request->text,
            'user_id' => Auth::user()->id,
            'date_created_at' => date('Y-m-d'),
        ]);

        return view('home', ['posts' => Post::with('user')->get()]);
    }
}
