<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        /*$blogs = DB::table('blogs')
        ->where('user_id', '=',"$user->id")
        ->get();*/
        $blogs = Blog::query()
        ->where('user_id', $user->id)
        ->get();
        return view('user.index', compact('user', 'blogs'));
    }
}
