<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $agreement = $request->boolean('agreement');

        //$request->filled('name');

        return 'Запрос';
    }
}