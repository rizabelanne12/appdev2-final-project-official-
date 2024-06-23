@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body d-flex gap-5 ">
                    <div class="profile-picture ">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="" style="height:75px;width:130px; border-radius:20%" >
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="" style="height:75px;width:130px; border-radius:20%">
                        @endif
                    </div>
                    <div class="profile-info">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary text-center">Edit Profile</a>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
