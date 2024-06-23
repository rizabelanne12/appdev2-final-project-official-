@extends('layout')
@section('content')
    <main>
        <div class="ms-auto me-auto mt-5" style="width:500px;">
           <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                       <div class="alert alert-danger">
                          {{$error}}
                       </div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

            @if(session()->has('sucess'))
                <div class="alert alert-sucess">
                    {{session('sucess')}}
                </div>
            @endif 
        </div>
           <p>We will send a link to your email to reset your password. Thank you!</p>
            <form action="{{route('reset-password.post')}}" method="POST" >
                @csrf 
                <input type="text" name="token" hidden value=""{{$token}}>
            <!-- email -->
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                 <!-- password -->
                <div class="mb-3">
                    <label class="form-label">Enter new Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                 <!-- password -->
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
  </main>
@endsection
