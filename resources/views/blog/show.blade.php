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

            <form class="d-inline" action="{{ route('blog.delete', $blog->id)}}" method="POST">
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

    @auth
    <form class="mt-4 pe-0" action="{{route('blogs.like', ["$blog->id"])}}" method="POST">
        @csrf
        <button type="submit" class="border-0 bg-transparent">
        @if (auth()->user()->likes->contains($blog->id))
            <i class="fa-solid fa-heart"></i>       
        @else
            <i class="fa-regular fa-heart"></i>
        @endif
        </button>
        <span>
            {{$blog->like->count()}}
        </span>
    </form>
    @endauth

    <h4 class="pt-2">
        Comments
    </h4>

    <div class="pt-1 pb-4">
        <x-form action="{{route('comment', $blog->id)}}" method="post">
            <x-input name="content" type="text" placeholder="Comment" />
            <x-button class="mt-3" type="submit">Published</x-button>
        </x-form>
    </div>

    @if ($comments->isEmpty())
        {{__('No Comments')}}
    @else
        @foreach ($comments as $comment)
        <div class="d-flex justify-content-between row m-2 card text-center">
            <div class="col">
                        <div id="flex-container">
                            <div class="flex-item" id="flex">{{$comment->content}}</div>
                            @if (Auth::id() == $comment->user_id)
                            <div class="raw-item" id="raw">
                                <form action="{{route('comment.delete', [$blog->id, $comment->id])}}" method = "POST">
                                @csrf
                                @method('DELETE')
                                <button style="color: red" type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </div>
                            @endif
                          </div>                          
            </div>
            <div class="col small text-muted">
                <div class="d-flex justify-content-between">
                    Create comment:
                    {{$comment->created_at}}
                    <div>
                        <a href="{{route('profile', $comment->user_id)}}">
                            {{author_comment("$comment->user_id")}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach  
    @endif

@endsection