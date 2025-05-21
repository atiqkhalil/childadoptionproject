@extends('login.layout')

@section('auth-content')

<!-- Login Form -->
 @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
      <form action="{{ route('user.loginsave') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="username">Enter your email</label>
          <input type="email" class="form-control  @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
            @error('email')
                <span class="invalid-feedback d-block mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
          <label for="login-password">Password</label>
           <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="signup-password" placeholder="Enter your password">
             @error('password')
                <span class="invalid-feedback d-block mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
          <label for="login-role">Role</label>
          <select id="login-role" name="role" class="form-control @error('role') is-invalid @enderror">
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
        
        <div class="options">
          <div class="remember-me">
            <input type="checkbox" id="remember" checked>
            <label for="remember">Remember this Device</label>
          </div>
          <a href="#" class="link" id="show-forgot">Forgot Password?</a>
        </div>
        
        <button type="submit" class="auth-btn">Sign In</button>
        
        <div class="toggle-link">
          Don't have an account? <a href="{{ route('user.register') }}" class="" id="">Sign Up</a>
        </div>
        
        <div class="toggle-link" style="margin-top: 10px;">
          <a href="#" class="link" id="show-change-password">Change Password</a>
        </div>
      </form>

@endsection