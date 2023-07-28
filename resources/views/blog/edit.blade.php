@extends('layouts.main')

@section('page.title', 'Edit blog')

@section('main.content')
    <x-title>
        {{ __('Edit blog') }}

        <x-slot name="link">
            <a href="{{ route('blogs.show', $blog['id']) }}">
                {{ __('Blog back') }}
            </a>
        </x-slot>
    </x-title>

    <x-blog.form action="{{route('blog.update', $blog['id'])}}" method="POST" :blog="$blog" >
        @method('PUT')
        <x-button type="submit">
            {{ __('Edit blog') }}
        </x-button>
    </x-blog.form>
@endsection