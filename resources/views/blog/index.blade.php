@extends('layouts.main')

@section('page.title', 'List Blogs')

@section('main.content')
    <x-title>
        {{__('List blogs')}}
    </x-title>

    @include('blog.filter')

<div class="text-center">
    @if ($blogs->isEmpty())
        {{__('No blogs')}}
    @else
        <div class="row">
            @foreach ($blogs as $blog)
                    <div class="col-12 col-md-4">
                        <x-blog.card :users="$users_names" :blog="$blog"/>
                    </div>
            @endforeach
        </div>

        {{$blogs->links()}}
    @endif
</div>

@endsection