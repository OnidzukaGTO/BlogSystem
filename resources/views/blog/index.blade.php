@extends('layouts.main')

@section('page.title', 'List Blogs')

@section('main.content')
    <x-title>
        {{__('List blogs')}}

        <x-slot name="right">
            <x-button-link href="{{ route('blog.create') }}">
                {{ __('Create Blog') }}
            </x-button-link>
        </x-slot>
    </x-title>

    @include('blog.filter')

<div class="text-center">
    @if ($blogs->isEmpty())
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