<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function store(Request $request){
        //$data = $request->all();
        //$data = $request->only(['name']);
        //$data = $request->except('email');
        //$avatar = $request->file('avatar');
        //$request->filled('name'); 
         
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'max:50', 'confirmed'],
            'agreement' => ['accepted'],
        ]);
        
        // First way
        /*$user = new User;
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->save();*/

        //Second way
        $user = User::query()->create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
        ]);

        $user_id = User::query()->where('email', $user['email'])->first();
        Auth::loginUsingId($user_id->id);
        $request->session()->regenerate();
        return redirect()->intended("user/profile/$user_id->id");
    }
}