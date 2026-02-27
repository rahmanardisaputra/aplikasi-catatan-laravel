<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Login</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center min-vh-100 d-flex align-items-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h3 class="mb-0 fw-bold">Sign In</h3>
                    </div>
                    <div class="card-body p-4">
                        <!-- Session Status Message -->
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="Enter your email" 
                                    required 
                                    autocomplete="username" 
                                    autofocus
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="Enter your password" 
                                    required 
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="mb-3 form-check">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember_me" 
                                    class="form-check-input"
                                >
                                <label class="form-check-label" for="remember_me">
                                    Remember me
                                </label>
                            </div>

                            <!-- Submit Button and Forgot Password Link -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Sign In
                                </button>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                                        Forgot your password?
                                    </a>
                                </div>
                            @endif
                        </form>
                        
                        <!-- Additional Links -->
                        <div class="text-center mt-4">
                            <p>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>