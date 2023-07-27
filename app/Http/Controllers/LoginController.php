<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function store(Request $request){
        /* $ip = $request->ip();
        $path = $request->path();
        $url = $request->url();
        $request->is('foo');
        request->routeIs('nameRoute*'); */

        //return response('Test', 200, []);
        //return response()->json(['foo' => 'bar'], 200, []);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->boolean('remember');


        return redirect()->route('blogs');
    }
}
