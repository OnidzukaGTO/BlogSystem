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
        </div>
    </x-card-body>
</x-card>