<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('Test.index');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'age' => ['nullable', 'integer', 'min:18', 'max:150'],
            'gender' => ['nullable', 'string', 'in:man,woman'],
        ]);
        dd($validate);
    }
}
