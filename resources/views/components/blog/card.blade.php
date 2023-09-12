@props(['users' => null, 'blog' => null])

<x-card>
    <div class="card-header">
        <h2 class="h6 items-text">
            <a href="{{route('blogs.show', $blog->id)}}">
                {{$blog->title}}
            </a>
        </h2>
    </div>
    <x-card-body>
        @if ($blog->file !== "null")
        @foreach (json_decode($blog->file) as $url)
        <div class="mb-3">
            <img src="{{asset($url)}}" width="150" height="130" alt="img">
        </div>
        @break
        @endforeach            
        @else
        <div class="mb-3">
            <img src="{{asset('images/no_image.jpg')}}" width="150" height="130" alt="img">
        </div>
        @endif

        <div class="d-flex justify-content-between row">
            <div class="col small text-muted">
                {{$blog->published_at?->diffForHumans()}}
            </div>

            @if ($users !== null)
            <div class="col small text-muted">
                @foreach ($users as $user)
                    @if ($user->id == $blog->user_id)
                        <a class="profile" href="{{route('profile', $user->id)}}">
                            {{$user->name}}
                        </a>
                    @endif
                @endforeach
            </div>
            @endif

            <x-blog.like :blog="$blog" />

            @guest
            <div>
                <i class="fa-regular fa-heart"></i>
                <span>
                    {{$blog->like->count()}}
                </span>
            </div>
            @endguest
        </div>
    </x-card-body>
</x-card>