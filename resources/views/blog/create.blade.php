@extends('layouts.main')

@section('page.title', 'Create Blog')

@section('main.content')
    <x-title>
        {{ __('Create Blog') }}

        <x-slot name="link">
            <a href="{{ route('blogs') }}">
                {{ __('List Blogs') }}
            </a>
        </x-slot>
    </x-title>
    <x-blog.form action="{{route('blogs.store')}}">
        <x-button type="submit">
            {{ __('Create blog') }}
        </x-button>
    </x-blog.form>
@endsection