<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">
        {{config('app.name')}}
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbar-collaplse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbar-collaplse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ active_link('home')}}" aria-current="page" href="{{route('home')}}">
            {{__('Home')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ active_link('blogs*')}}" aria-current="page" href="{{route('blogs')}}">
            {{__('Blog')}}
            </a>
          </li>

          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link {{ active_link('profile')}}" aria-current="page" href="{{route('profile', Auth::id())}}">
            {{__('My profile')}}
            </a>
          </li>
          
          @endif
          
        </ul>

        @if (Auth::check())
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('logout')}}">
              {{__('Logout')}}
            </a>
          </li>
        </ul>  
        @else
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ active_link('register')}}" aria-current="page" href="{{route('register')}}">
              {{__('Register')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{active_link('login')}}" aria-current="page" href="{{route('login')}}">
              {{__('Login')}}
            </a>
          </li>
        </ul>  
        @endif

      </div>
    </div> 
  </nav>