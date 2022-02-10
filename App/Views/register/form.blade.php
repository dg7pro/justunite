@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3">

            @include('layouts.partials.alert')


            <h1>Register</h1>
            <p><i class="bi bi-person-fill"></i> Create Your Account</p>

            <form action="{{'/register/create'}}" method="post" autocomplete="off">

                <div>
                    <input type="hidden" name="token" value="{{$_SESSION['csrf_token']}}" />
                </div>

                <div class="mb-3">
                    <input class="form-control" list="datalistOptions"  id="membership" name="membership"  placeholder="Membership">
                    <datalist id="datalistOptions">
                        <option value="Volunteer">
                        <option value="Core Member">
                        <option value="Observer">
                    </datalist>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Email" autocomplete="off">
                </div>

                <div class="mb-3 ps-2">
                    <a href=""><b>Use mobile instead</b></a>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="newPassword" name="password" placeholder="New Password" minlength="6" autocomplete="new-password">
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="cPassword" name="cPassword" placeholder="Retype Password" minlength="6" >
                </div>

                <button type="submit" value="Register" class="btn btn-primary">Register</button>
            </form>
            <p class="mt-3">Already have account? <a href="{{'/login/index'}}">Log In</a></p>

        </div>
    </section>
    <!-- login ends -->

@endsection