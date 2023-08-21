@extends('layouts.main')

@section('page.title', 'Profile')

@section('main.content')
    <x-title>
        <h1>
            {{$user->name}}
        </h1>

        @if ($user->id == Auth::id())
        <x-slot name="right">
            <x-button-link href="{{ route('blog.create') }}">
                {{ __('Create Blog') }}
            </x-button-link>
            <form class="mt-3" action="{{route('user.delete', $user)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    {{ __('Delete Account') }}
                </button>
            </form>
        </x-slot>
        @endif
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