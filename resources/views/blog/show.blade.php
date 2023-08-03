@extends('layouts.main')

@section('main.content')
    <x-title>
        {{$blog->title}}
        <x-slot name='link'>
            <a href="{{route('blogs')}}">
                {{__('List blogs')}}
            </a>
        </x-slot>

        <x-slot name="right">
            <x-button-link href="{{ route('blog.edit', $blog->id) }}">
                {{ __('Edit') }}
            </x-button-link>
        </x-slot>
    </x-title>
    <div>
        {!! $blog->content !!}
    </div>
@endsection