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

    <script>
        let url = '';
        let elements = document.querySelectorAll(".like");
        let hearts = document.querySelectorAll(".heart");
        let count = 0;
        async function like(id) {
        url = window.location.origin + "/user/blogs/" + id + '/like';
        console.log(url);
            await fetch(url).then(response => update(response,id));
        }
        async function update(is_like,id) {
            const element=document.querySelector(`span[data-id="${id}"]`)
            const heart=document.querySelector(`i[data-id="${id}"]`)
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
    @endauth
