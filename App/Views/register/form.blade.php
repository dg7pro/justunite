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

                <div class="row g-2 mb-3 mt-4">
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" id="membership" name="membership" aria-label="Floating label select example">
                                <option selected value="">Select Type</option>
                                <option value="Volunteer">Volunteer</option>
                                <option value="Core Member">Core Member</option>
                                <option value="Observer">Observer</option>
                            </select>
                            <label for="religion">Membership</label>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            <label for="floatingInput">Full name</label>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="uid" name="email" placeholder="Email" autocomplete="off">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>
                </div>

                {{-- Important --}}
               {{-- <div class="mb-3 ps-2">
                    <a href="javascript:void(0)" id="changer">Use mobile instead</a>
                </div>--}}

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="newPassword" name="password" placeholder="New Password" minlength="7" autocomplete="new-password">
                            <label for="floatingInput">Password</label>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="cPassword" name="cPassword" placeholder="Retype Password" minlength="7" autocomplete="new-password">
                            <label for="floatingInput">Retype Password</label>
                        </div>
                    </div>
                </div>

                <!-- Google reCAPTCHA widget -->
                <div class="g-recaptcha" data-sitekey="6LdBfJseAAAAAKV_1ZbHUbpjbDUnDzAYrQ5PNt5p" data-badge="inline" data-size="invisible" data-callback="setResponse" hidden></div>
                <input type="hidden" id="captcha-response" name="captcha-response" />

                <div class="d-grid gap-2 col-6 mt-5">
                    <button class="btn btn-primary btn-lg" type="submit" value="Register" >Register</button>
                </div>

            </form>
            <p class="mt-3">Already have account? <a href="{{'/login/index'}}">Log In</a></p>

        </div>
    </section>
    <!-- login ends -->

@endsection

@section('extra_js')
    <script>

        $(document).ready(function(){

            $('#changer').on('click', function(){
                var msg = $(this).html();
                console.log(msg);

                if(msg=="Use mobile instead"){
                    $('#uid').attr('name','mobile');
                    $('#uid').attr('placeholder','Mobile');
                    $('#changer').html('Use email instead')
                }

                if(msg=="Use email instead"){
                    $('#uid').attr('name','email');
                    $('#uid').attr('placeholder','Email');
                    $('#changer').html('Use mobile instead')
                }

            });

        });

    </script>

    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback" async defer></script>
    <script>

        /* Google Recaptcha Response */
        var onloadCallback = function() {
            grecaptcha.execute();
        };
        function setResponse(response) {
            document.getElementById('captcha-response').value = response;
        }

    </script>
@endsection
