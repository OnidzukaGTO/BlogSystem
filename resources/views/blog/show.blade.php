@extends('layouts.main')

@section('main.content')
    <x-title>
        {{$blog->title}}

        <x-slot name="author">
            <a class="profile" href="{{route('profile',$blog->user_id)}}">
                By {{$user->name}}
            </a>
        </x-slot>

        <x-slot name='link'>
            <a class="profile" href="{{route('blogs')}}">
                {{__('List blogs')}}
            </a>
        </x-slot>
        
        @if ($user->id == Auth::id())
        <x-slot name="right">
            <x-button-link href="{{ route('blog.edit', $blog->id) }}">
                {{ __('Edit') }}
            </x-button-link>
        </x-slot>
        @endif
    </x-title>
    <div>
        {!! $blog->content !!}
    </div>
@endsection