@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3">

            @include('layouts.partials.alert')

            <h2>Newsletter Subscription</h2>
            <p><i class="bi bi-email-fill"></i> Please provide your email</p>

            <form action="{{'/subscribe/add'}}" method="post">

                <div>
                    <input type="hidden" name="token" value="{{$_SESSION['csrf_token']}}" />
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Your email" autofocus required>
                </div>

                <!-- Google reCAPTCHA widget -->
                <div class="g-recaptcha" data-sitekey="6LdBfJseAAAAAKV_1ZbHUbpjbDUnDzAYrQ5PNt5p" data-badge="inline" data-size="invisible" data-callback="setResponse" hidden></div>
                <input type="hidden" id="captcha-response2" name="captcha-response2" />

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

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
            document.getElementById('captcha-response2').value = response;
        }

    </script>

@endsection