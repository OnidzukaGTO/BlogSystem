<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog){
        $validate = $request->validate([
            'content' => ['required', 'string']
        ]);

        auth()->blog()->
        $comment = Comment::query()->create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'content' => $validate['content']
        ]); 
        return redirect()->back();
    }
}
