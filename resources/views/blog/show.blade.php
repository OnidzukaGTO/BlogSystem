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

            <form action="{{ route('blog.delete', $blog->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    {{ __('Delete') }}
                </button>
            </form>
        </x-slot>
        @endif
    </x-title>

    <div>
        {!! $blog->content !!}
    </div>

    <h4 class="pt-5">
        Comments
    </h4>

    <div class="pt-1 pb-4">
        <x-form action="{{route('comment', $blog->id)}}" method="post">
            <x-input name="content" type="text" placeholder="Comment" />
            <x-button class="mt-3" type="submit">Popka Egora</x-button>
        </x-form>
    </div>

    @foreach ($comments as $comment)
        <div class="d-flex justify-content-between row m-2 card text-center">
            <div class="col">
                {{$comment->content}}
            </div>
            <div class="col small text-muted">
            Create comment:
                {{$comment->created_at}}
            </div>
        </div>
    @endforeach

@endsection