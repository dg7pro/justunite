@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3">

            @include('layouts.partials.alert')

            <h1>Sign In</h1>
            <p><i class="bi bi-person-fill"></i> Sign Into Your Account</p>

            <form action="{{'/login/authenticate'}}" method="post" >
                <div>
                    <input type="hidden" name="token" value="{{$_SESSION['csrf_token']}}" />
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" id="uid" name="uid" placeholder="Email/Mobile" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
                </div>

                <div class="remember-me">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me" value="remember_me" name="remember_me" checked>
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <div><a href="{{'/password/forgot'}}">Forget Password?</a></div>
                </div>

                <button type="submit" name="login-submit" class="btn btn-primary">Log in</button>

            </form>
            <p class="mt-3">Don't have an account yet? <a href="{{'/register/index'}}">Sign Up</a></p>

        </div>
    </section>
    <!-- login ends -->

@endsection