<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
