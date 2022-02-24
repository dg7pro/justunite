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

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </section>
    <!-- login ends -->
@endsection
