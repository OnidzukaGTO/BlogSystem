@props(['blog' => null])

    @auth

    <div>
        <button onclick="like({{$blog->id}})" class="border-0 bg-transparent">
            @if (auth()->user()->likes->contains($blog->id))
                <i data-id="{{$blog->id}}" style="color:#d90d0d" class="fa-solid fa-heart heart"></i>    
            @else
                <i data-id="{{$blog->id}}" class="fa-regular fa-heart heart"></i>
            @endif
            </button>
            <span data-id="{{$blog->id}}" class="like">
                {{$blog->like->count()}}
            </span> 
    </div>

    @endauth
