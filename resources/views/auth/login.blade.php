@extends('layout.default')
@section('title','Already have an account? Login!')

@section('body')
    <div class="row full-screen"> 
    <!-- login screen -->
        <!-- hide this on small screen  -->
        <div class="col-lg-5 side-bg absolute-div text-white ">
            <div class="divider" style="border-right: 2px solid #c8cbcf; height: 70%; padding: 0 5px;">
                <div class="row">
                    <div class="col-12 text-on-image">
                        <h1 class="page-desc">Welcome Back!</h1>
                            <p id="welcome-back-note">
                                We have exciting blogs specially created for you!
                            
                            </p>
                    </div>
                    <div class="col-4"> 
                        <img src="{{ asset('assets/frontend/assets/images/privacy.jpg') }}" alt="logo" width="70" height="70">
                    </div>
                </div>
            </div>
        </div>
        <!-- hide on small screen ends here -->
        <div class="col-12 col-md-12 col-lg-7 add-padding" style="margin-top: 15%;">
            <div class="row justify-content-center">
                <div class="col-11">
                    <h2 id="sign-in-text">Sign In</h2>
                </div>
            </div>
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-11">
                        @include('includes.alert')
                        <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="email" class="col-form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" required>
                                </div>


                                <div class="form-group col-12">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>


                                <div class="col flex-this">
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="remember" id="remember-me">
                                        <label class="">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="my-3 col-12 col-md-2  button-color proceed">Sign in</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
