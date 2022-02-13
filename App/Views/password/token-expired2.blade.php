@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="blank-page">
        <div class="container">

            <div class="ju-box-confirm">
                <div class="text-center">
                    <h2>Reset token expired</h2>
                    <p>Password reset link invalid or expired please
                        <b><u><a href="{{'/password/forgot'}}">click here</a></u></b>
                        to request another.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- login ends -->

@endsection
