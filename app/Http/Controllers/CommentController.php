<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog){
        $validate = $request->validate([
            'content' => ['required', 'string']
        ]);

        //dd(Auth::user()->blogs()->find($blog->id));
        $comment = Comment::query()->create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'content' => $validate['content']
        ]); 
        return redirect()->back();
    }
}
