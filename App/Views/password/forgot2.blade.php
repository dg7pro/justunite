@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3">

            @include('layouts.partials.alert')

            <h2>Forgot Password ?</h2>
            <p><i class="bi bi-person-fill"></i> Enter your email address</p>

            <form action="{{'/password/request-reset'}}" method="post" class="form full-ht">

                <div>
                    <input type="hidden" name="token" value="{{$_SESSION['csrf_token']}}" />
                    {{--<input type="hidden" name="token" value="65f575dd7ba89dbd08a02a86bf990514eb8182254f9af1299d75cd1f92a7ec1" />--}}
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" autofocus required>
                </div>

                <button type="submit" name="forgot-password-submit" class="btn btn-primary">Send Reset Link</button>

            </form>

        </div>
    </section>
    <!-- login ends -->
@endsection
