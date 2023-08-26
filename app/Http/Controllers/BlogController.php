<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request){
        $validate = $request->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
        ]);

        $query = Blog::query();
        if ($search = $validate['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }
        if ($from_date = $validate['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($from_date));
        }
        if ($to_date = $validate['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($to_date));
        }
        if ($tag = $validate['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }

        $blogs = $query->latest('published_at')
        ->where('published', true)
        ->whereNotNull('published_at')
        ->paginate(12);

        $users_names = DB::select('select id, name from users ');
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
        return view('blog.index', compact('blogs', 'users_names'));
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
            'file.*' => ['nullable', 'image:jpg, jpeg, png','max:2048'],
            'published_at' => ['nullable', 'string', 'date'],   
            'published' => ['nullable', 'boolean'],
        ])->validate();

        /* if (true) {
            throw ValidationException::withMessages([
                'account' => __('Error')
            ]);
        }*/
        foreach ($validated['file'] as $file) {
            $file = Storage::put('images', $file);
            $files[]= $file;
        }

        $blog = Blog::query()->firstOrCreate([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
        ], [
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at'] ?? null),
            'published' => $validated['published'] ?? false,
            'file' => json_encode($files)
        ]);

        
        /*for ($i=0; $i<99 ; $i++) { 
            Blog::query()->create([
                'user_id' => User::query()->value('id'),
                'title' => fake()->sentence(),
                'content' => fake()->paragraph(),
                'published' => true,
                'published_at' => fake()-> dateTimeBetween(now()->subYear(), now()),
            ]);
        }*/
        return redirect()->route('blogs.show', $blog->id);
    }

    public function show(Request $request,Blog $blog){
        $user = User::query()
        ->where('id', $blog->user_id)
        ->first();
        
        $comments = Comment::query()
        ->where('blog_id', $blog->id)
        ->get();


        $count_pict = (count(json_decode($blog->file)));
        foreach (json_decode($blog->file) as $url) {
            $url = asset('storage/'.$url);
        }
        $counter = 0;
        //$url = Storage::url($blog->file);
        //$blog = Blog::query()->oldest('id')->firstOrFail(['id', 'title']);
        //$blog = Blog::query()->chunk/chunkById(10, function...);
        return view('blog.show', compact('blog', 'user', 'comments', 'url', 'counter', 'count_pict'));
    }

    public function edit(Blog $blog){
        if (Auth::id() == $blog->user_id) {
            return view('blog.edit', compact('blog'));
        }
        return redirect()->back();
    }

    public function update(Request $request, Blog $blog){
        $validate=validator($request->all(),[
            'title' => ['required', 'string','max:100'],
            'content' => ['required', 'string'],
            'file.*' => ['nullable', 'image:jpg, jpeg, png','max:2048'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
            
        ])->validate();

        if (!empty($validate['file'])) {
            foreach ($validate['file'] as $file) {
                $file = Storage::put('images', $file);
                $files[]= $file;
            }
        }
        else {
            foreach (json_decode($blog->file) as $file) {
                $files[]= $file;
            }
        }

        $blog->fill([
            'title' => $validate['title'],
            'content' => $validate['content'],
            'published_at' => new Carbon($validate['published_at']) ?? null,
            'published' => $validate['published'] ?? false,
            'file' => json_encode($files) 
        ])->save();
        return redirect()->route('blogs.show',$blog->id);
    }
    public function delete(Blog $blog){
        //$i = Auth::user()->blogs()->first()->comments()->get();

        if (Auth::id() == $blog->user_id) {
            Storage::delete(json_decode($blog->file));
            DB::table('comments')->where('blog_id', $blog->id)->delete();
            DB::table('blogs')->where('id', $blog->id)->delete();
            return redirect()->route('blogs');
        }
        return redirect()->back();
    }
}