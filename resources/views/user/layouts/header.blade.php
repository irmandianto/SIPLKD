 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Qatulistiwa Islam</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === '/' ? 'bg-primary': ''}}" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === 'layanan' ? 'bg-primary': ''}}" href="/layanan">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === 'event' ? 'bg-primary': ''}}" href="/event">Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === 'about' ? 'bg-primary': ''}}" href="/about">About</a>
            </li>
            <li class="nav-item">
                @if (Auth::guest())
              <a  class="nav-link {{ Request::path() === 'login' ? 'bg-primary': ''}}" href="{{route ('login')}}">Login</a>
              @else
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}


           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
           </form>
           @endif
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- Page Header -->
    <header class="masthead" style="background-image: url(@yield('bg-img'))">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>@yield('title')</h2>
              <span class="subheading">@yield('sub-heading')</span>
            </div>
          </div>
        </div>
      </div>
    </header>
