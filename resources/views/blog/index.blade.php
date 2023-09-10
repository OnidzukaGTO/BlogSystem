@extends('layouts.main')

@section('page.title', 'List Blogs')

@section('main.content')
    <x-title>
        {{__('List blogs')}}
    </x-title>

    @include('blog.filter')

<div class="text-center">
    @if ($blogs->isEmpty())
        {{__('No blogs')}}
    @else
        <div class="row">
            @foreach ($blogs as $blog)
                    <div class="col-12 col-md-4">
                        <x-blog.card :users="$users_names" :blog="$blog"/>
                    </div>
            @endforeach
        </div>

        {{$blogs->links()}}
    @endif
</div>

<script>
    let url = '';
    let element = document.getElementById("like");
    let heart = document.getElementById("heart");
    let count = 0;
    async function like(id) {
        url = {{ route('blogs.store', [$id] )}};
        await fetch(url).then(response => update(response));
    }
    async function update(is_like) {
        if (await is_like.json()) {
            count = parseInt(element.textContent) + 1;
            heart.classList.remove('fa-regular');
            heart.classList.add('fa-solid');
            heart.style.color = ("#d90d0d");
        } else {
            count = parseInt(element.textContent) - 1;
            heart.classList.remove('fa-solid');
            heart.classList.add('fa-regular');
            heart.style.color = ("");
        }
        element.textContent = count.toString();
    }
</script>
@endsection