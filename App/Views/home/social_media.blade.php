@extends('layouts.inner')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{'/'}}">Home</a></li>
                    <li><a href="{{'/problems/index'}}">Problems</a></li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section>
            <div class="container">
                @include('layouts.partials.alert')

                <h2>Problems in India</h2>
                <p><i class="bi bi-person-fill"></i> India has to resolve these problems before it become superpower</p>

                <div class="list-group">
                    @foreach($problems as $problem)

                        <a href="#" class="list-group-item list-group-item-action">{{$problem->id.'. '.$problem->title}}</a>
                    @endforeach
                    {{--<a href="#" class="list-group-item list-group-item-action">A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>--}}

                </div>
            </div>

        </section>


    </main>


@endsection
