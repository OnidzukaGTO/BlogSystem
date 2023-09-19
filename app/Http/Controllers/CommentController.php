<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog){
        $validate = $request->validate([
            'content' => ['required', 'string', 'max:200']
        ]);

        //dd(Auth::user()->blogs()->find($blog->id));
        Comment::query()->create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'content' => $validate['content']
        ]);
        
        return redirect()->back();
    }

    public function delete(Blog $blog, Comment $comment){
        DB::table('comments')->where('id', $comment->id)->delete();
        return redirect()->back();
    }
    
    //Write to CV
}
