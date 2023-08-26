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

    <div class="mb-5">
        {!! $blog->content !!}
    </div>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-inner">
            @if (json_decode($blog->file))
            @foreach (json_decode($blog->file) as $url)
            @if ($counter < $count_pict-1)
            <div class="carousel-item">
                <img src="{{asset('storage/'.$url)}}" class="d-block w-100" alt="...">
            </div>
            @else
            <div class="carousel-item active">
                <img src="{{asset('storage/'.$url)}}" class="d-block w-100" alt="...">
            </div>
            {{$counter = 0;}}
            @endif
            {{$counter++;}}
            @endforeach
        </div>
        @if ($count_pict > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        @endif
                
            @else
                <img src="{{$url}}" class="d-block w-100" alt="...">
            @endif
      </div>

    @auth
    <form class="mt-4 pe-0" action="{{route('blogs.like', ["$blog->id"])}}" method="POST">
        @csrf
        <button type="submit" class="border-0 bg-transparent">
        @if (auth()->user()->likes->contains($blog->id))
        <i class="fa-solid fa-heart" style="color: #d90d0d;"></i>    
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