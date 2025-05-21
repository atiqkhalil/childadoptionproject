@extends('login.layout')

@section('auth-content')
    <form action="{{ route('user.registersave') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your full name">
            @error('name')
                <span class="invalid-feedback d-block mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
            @error('email')
                <span class="invalid-feedback d-block mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="signup-role">Role</label>
            <select id="signup-role" name="role" class="form-control @error('role') is-invalid @enderror">
                <option value="">Select your role</option>
                <option value="admin">Admin</option>
                <option value="agency_staff">Agency Staff</option>
                <option value="user">User</option>
            </select>
            @error('role')
                <span class="invalid-feedback d-block mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="signup-password" placeholder="Create a password">
             @error('password')
                <span class="invalid-feedback d-block mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="auth-btn">Sign Up</button>

        <div class="toggle-link">
            Already have an account? <a href="{{ route('user.login') }}" class="link">Sign In</a>
        </div>
    </form>
@endsection
