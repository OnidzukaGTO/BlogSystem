<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($blogId){
        $user = User::findOrFail(Auth::id());
        $user->likes()->toggle($blogId);
        return redirect()->back();
    }
}
