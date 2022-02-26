@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3">

            @include('layouts.partials.alert')

            <h2>Reset Password ?</h2>
            <p><i class="bi bi-person-fill"></i> Enter new password</p>

            <form action="{{'/password/reset-password'}}" method="post">

                <div>
                    <input type="hidden" name="token" value="{{$token}}" />
                    {{--<input type="hidden" name="token" value="65f575dd7ba89dbd08a02a86bf990514eb8182254f9af1299d75cd1f92a7ec1" />--}}
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password"  placeholder="New password" autofocus required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="cPassword" name="confirm_password" placeholder="Confirm password" required>
                </div>

                <!-- Google reCAPTCHA widget -->
                <div class="g-recaptcha" data-sitekey="6LdBfJseAAAAAKV_1ZbHUbpjbDUnDzAYrQ5PNt5p" data-badge="inline" data-size="invisible" data-callback="setResponse" hidden></div>
                <input type="hidden" id="captcha-response" name="captcha-response" />


                <button type="submit" name="reset-password-submit" class="btn btn-primary">Reset Password</button>

            </form>

        </div>
    </section>
    <!-- login ends -->
@endsection

@section('extra_js')

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