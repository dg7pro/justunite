@extends('layouts.inner')

@section('content')

    <section class="blank-page">
        <div class="container">

            <div class="ju-box-error">
                <div class="text-center">
                    <h2> 500 Internal server error</h2>
                    <p>{{$msg}} </p>
                </div>
            </div>

        </div>
    </section>

@endsection


