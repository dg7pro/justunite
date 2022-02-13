@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="blank-page">
        <div class="container">

            @include('layouts.partials.alert')

            <div class="ju-box-confirm">
                <div class="text-center">
                    <h2>Please check your email</h2>
                    <p>Account confirmation email sent to your inbox / spam </p>
                </div>
            </div>

        </div>
    </section>
    <!-- login ends -->

@endsection
