<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        @auth
        <a class="navbar-brand" href="{{ route('stories.index') }}">My Story</a>
        <a class="nav-link active" aria-current="page" href="{{ route('stories.index') }}">Home</a>
        <a class="nav-link" href="{{route('logout')}}">Logout</a>
        <a href="{{ route('profile.show') }}" class="btn btn-primary">Profile</a>
        @else
        <a class="navbar-brand" href="{{ route('home') }}">My Story</a>
        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        <a class="nav-link" href="{{route('login')}}">Login</a>
        <a class="nav-link" href="{{route('registration')}}">Registration</a>
        @endauth
      </div>
    </div>
  </div>
</nav>