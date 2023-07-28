<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        //dd($search,$category_id);
        $blog = [
            'id' => 1,
            'title' => 'War',
            'content' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, ad.',
            'category_id' => 1
        ];

        $blogs = array_fill(0,10,$blog);
        $blogs = array_filter($blogs, function ($blog) use ($search, $category_id){
            if ($search && ! str_contains(strtolower($blog['title']), strtolower($search))) {
                return false;
            }
            if ($category_id && $blog['category_id'] != $category_id) {
                return false;
            }
            return true;
        });
        return view('blog.index', compact('blogs'));
    }
    public function create(){
        return view('blog.create');
    }
    public function store(Request $request){
        $title = $request->input('title');
        $content = $request->input('content');

        return redirect()->route('blogs.show', 1);
    }
    public function show($blog){
        $blog = [
            'id' => 1,
            'title' => 'War',
            'content' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, ad.'
        ];
        $blogs = array_fill(0,10,$blog);
        return view('blog.show', compact('blog'));
    }
    public function edit($blog){
        $blog = [
            'id' => 1,
            'title' => 'War',
            'content' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, ad.'
        ];
        return view('blog.edit', compact('blog'));
    }
    public function update(Request $request, $blog){
        $title = $request->input('title');
        $content = $request->input('content');

        return redirect()->back();
    }
    public function delete($blog){
        return redirect()->route('blogs');
    }
}