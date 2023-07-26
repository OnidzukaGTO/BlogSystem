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
    
    <x-form method="GET" action="{{route('blogs')}}">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <x-input name="search" placeholder="{{__('Filter')}}" />
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <x-select name="category_id"  />
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <x-button type="submit" class="w-100">
                        {{__('Filtr')}}
                    </x-button>
                </div>
            </div>
        </div>
    </x-form>

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

@endsection