@extends('layouts.inner')

@section('content')

    <section class="blank-page">
        <div class="container">

            <div class="ju-box-error">
                <div class="text-center">
                    <h2> 401 Unauthorized Access</h2>
                    <p>{{$msg}} </p>
                </div>
            </div>

        </div>
    </section>

@endsection
