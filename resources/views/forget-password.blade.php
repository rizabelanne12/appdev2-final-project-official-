@extends('layout')
@section('title','Forget Password')
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
            <form action="{{route('forgert-password.post')}}" method="POST" >
                @csrf 
            <!-- email -->
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
  </main>
@endsection
