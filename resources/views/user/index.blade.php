@extends('layouts.main')

@section('main.content')
<x-title>
    {{__('List blogs')}}
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
    @endif
</div>
