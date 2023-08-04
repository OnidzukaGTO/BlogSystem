<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        //dd($search,$category_id);
        /*$blog = [
            'id' => 1,
            'title' => 'War',
            'content' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, ad.',
            'category_id' => 1
        ];*/

        /*$blogs = array_fill(0,10,$blog);
        $blogs = array_filter($blogs, function ($blog) use ($search, $category_id){
            if ($search && ! str_contains(strtolower($blog['title']), strtolower($search))) {
                return false;
            }
            if ($category_id && $blog['category_id'] != $category_id) {
                return false;
            }
            return true;
        });*/

        //$blogs = Blog::query()->limit(10)->offset()->get(['id', 'title' , 'published_at']);
        //$blogs = Blog::query()->paginate(12, ['id', 'title' , 'published_at']); 

        //latest = ->orderBy('', 'asc/desc')
        //$blogs = Blog::query()->latest('published_at')->paginate(12, ['id', 'title' , 'published_at']);
        $blogs = Blog::query()
            ->where('published', true)
            ->whereNotNull('published_at')
            ->paginate(12);
        return view('blog.index', compact('blogs'));
    }
    public function create(){
        return view('blog.create');
    }
    public function store(Request $request){
        //$title = $request->input('title');
        //$content = $request->input('content');

        $validated=validator($request->all(),[
            'title' => ['required', 'string','max:100'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ])->validate();
       
        /* if (true) {
            throw ValidationException::withMessages([
                'account' => __('Error')
            ]);
        }*/

        /*$blog = Blog::query()->firstOrCreate([
            'user_id' => User::query()->value('id'),
            'title' => $validated['title'],
        ], [
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at'] ?? null),
            'published' => $validated['published'] ?? false,

        ]);
        */
        for ($i=0; $i<99 ; $i++) { 
            Blog::query()->create([
                'user_id' => User::query()->value('id'),
                'title' => fake()->sentence(),
                'content' => fake()->paragraph(),
                'published' => true,
                'published_at' => fake()-> dateTimeBetween(now()->subYear(), now()),
            ]);
        }
        return redirect()->route('blogs.show', 1);
    }
    public function show(Request $request,Blog $blog){
        //$blog = Blog::query()->oldest('id')->firstOrFail(['id', 'title']);
        //$blog = Blog::query()->chunk/chunkById(10, function...);
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
        $validate=validator($request->all(),[
            'title' => ['required', 'string','max:100'],
            'content' => ['required', 'string'],
        ])->validate();

        dd($validate);
        return redirect()->back();
    }
    public function delete($blog){
        return redirect()->route('blogs');
    }
}