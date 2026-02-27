<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Register</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center min-vh-100 d-flex align-items-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h3 class="mb-0 fw-bold">Create Account</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter your full name" 
                                    required 
                                    autocomplete="name" 
                                    autofocus
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="Enter your email address" 
                                    required 
                                    autocomplete="username"
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
                                    placeholder="Create a password" 
                                    required 
                                    autocomplete="new-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation" 
                                    class="form-control" 
                                    placeholder="Retype your password" 
                                    required 
                                    autocomplete="new-password"
                                >
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Register
                                </button>
                            </div>
                        </form>
                        
                        <!-- Login Link -->
                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Sign in here</a></p>
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