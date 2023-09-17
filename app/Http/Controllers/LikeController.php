<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($blogId){
        $user = User::findOrFail(Auth::id());
        $user->likes()->toggle($blogId);
        $data = (boolean)$user->likes()->where('id', '=', $blogId)->first();
        return response()->json($data)->header('Content-Type', 'application/json');
    }
}