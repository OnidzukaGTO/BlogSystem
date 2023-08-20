<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($data)){
            if (Auth::attempt(['admin' => 1])) {
                return redirect('admin.index');
            }
            $request->session()->regenerate();
            $id = Auth::id();
            return redirect()->intended("user/profile/$id");
        }
        /*if (true) {
            return redirect()->back()->withInput();
        }*/
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
