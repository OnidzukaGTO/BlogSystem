<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
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
        ->paginate(12); 
        return view('user.index', compact('user', 'blogs'));
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        
        return redirect('/');
    }
}