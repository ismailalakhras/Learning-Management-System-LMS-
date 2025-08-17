@extends('frontend.layout.master')



@push('css')
    @vite(['resources\css\frontend\register.css'])
@endpush




@section('content')
    <span style="display:flex ;justify-content:center">

        <div class=" register-container" style="max-width: 1356px">

            <img class="leftSide-register" src="{{ asset('images/register.png') }}" alt="">
            <div class="signup-container mx-auto">


                <div class="signup-form">
                    <div class="signup-header">
                        <h1>Create Your Account</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input name="firstName" type="text" class="form-control form-control-lg"
                                        placeholder="First Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input name="lastName" type="text" class="form-control form-control-lg"
                                        placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input name="userName" type="text" class="form-control form-control-lg"
                                placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="text" class="form-control form-control-lg"
                                placeholder="Email ID">
                        </div>

                        @error('email')
                            <div class="error"
                                style=" border: 1px solid #ff00005e; padding: 5px; margin: 0 0 5px 0;background: #ff00004a;color: #f90000;">
                                {{ $message }}</div>
                        @enderror

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="password-container">
                                        <input name="password" type="password" class="form-control form-control-lg"
                                            id="password" placeholder="Enter Password" required>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="password-container">
                                        <input name="password_confirmation" type="password"
                                            class="form-control form-control-lg" id="confirmPassword"
                                            placeholder="Confirm Password" required>

                                    </div>
                                </div>
                                @error('password')
                                    <div class="error"
                                        style=" border: 1px solid #ff00005e; padding: 5px; margin: 0 0 5px 0;background: #ff00004a;color: #f90000;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn create-btn">Create Account <img
                                src="{{ asset('images/icons/arrowRight.svg') }}" alt=""></button>

                        <div class="divider">Sign up with</div>

                        <div class="social-login">
                            <a href="#" class="social-btn facebook-btn">
                                <img src="{{ asset('images/icons/Facebook_Logo_Primary.svg') }}" alt=""> Facebook
                            </a>
                            <a href="#" class="social-btn google-btn">
                                <img src="{{ asset('images/icons/google.svg') }}" alt=""> Google
                            </a>
                            <a href="#" class="social-btn microsoft-btn">
                                <img src="{{ asset('images/icons/window.svg') }}" alt=""> Microsoft
                            </a>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        </span>
@endsection
