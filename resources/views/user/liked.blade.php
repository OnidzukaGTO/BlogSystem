@extends('layouts.main')

@section('page.title', 'Liked Blogs')

@section('main.content')
    <x-title>
        <h1>
            {{__('Liked Blogs')}}
        </h1>
    </x-title>

<div class="text-center">
    @if (empty($blogs))
        {{__('No blogs')}}
        @else      
        <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-12 col-md-4">
            <x-blog.card :blog="$blog" />
        </div>   
        @endforeach
    </div>
    {{$blogs->links()}}
    @endif
</div>
@endsection