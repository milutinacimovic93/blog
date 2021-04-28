<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::published()->orderBy('title')->get();
    return view('posts.index', compact('posts'));
  }

  public function show(Post $post)
  {
    if (!$post->is_published) {
        throw new ModelNotFoundException();
    }
    return view('posts.show', compact('post'));
  }
}
