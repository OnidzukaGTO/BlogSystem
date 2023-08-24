<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($id){
        $user = User::query()
        ->where('id',$id)
        ->first();
        /*$blogs = DB::table('blogs')
        ->where('user_id', '=',"$user->id")
        ->get();*/
        $blogs = Blog::query()->latest('published_at')
        ->where('user_id', $user->id)
        ->paginate(12); 
        return view('user.index', compact('user', 'blogs'));
    }

    public function liked($id){
        //$blogs = Auth::user()->like()->join('blogs', 'blogs.id', '=', 'blog_id')->get();
        //$blogs = Blog::join("likes", "user_id", "=", "likes.user_id")->paginate(12);
        
        $blogs = Blog::join('likes', 'id', '=', 'blog_id')->where('likes.user_id', '=', $id)->paginate(12);
        $users_names = DB::select('select id, name from users ');
        return view('user.liked', compact('blogs', 'users_names'));
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function delete(User $user){
        if (Auth::id() == $user->id) {
            DB::table('users')->where('id', $user->id)->delete();
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
