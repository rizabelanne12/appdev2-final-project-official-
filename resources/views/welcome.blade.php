@extends('layout')
@section('title', 'Home Page')
@section('content')

    <div class="d-flex flex-column justify-content-center fs-2 fw-bold">

    <div class="d-flex justify-content-center fs-2 fw-bold text-info">
        <h1>Welcome to My Story</h1>
    </div>
        
        @auth
            <main>
                @yield('content')
            </main>
         </div>
      @endauth
         
     </div>

@endsection