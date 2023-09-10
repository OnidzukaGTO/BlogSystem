@props(['blog' => null])

    @auth

    <div>
        <button onclick="like({{$blog->id}})" class="border-0 bg-transparent">
            @if (auth()->user()->likes->contains($blog->id))
                <i id="heart" class="fa-solid fa-heart"></i>    
            @else
                <i id="heart" class="fa-regular fa-heart"></i>
            @endif
            </button>
        
            <span id="like">
                {{$blog->like->count()}}
            </span> 
    </div>
    @endauth