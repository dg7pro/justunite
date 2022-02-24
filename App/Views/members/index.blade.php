@extends('layouts.inner')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{'/'}}">Members</a></li>
                    <li><a href="{{'/members/index'}}">members list</a></li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section>
            <div class="container">
                @include('layouts.partials.alert')

                <h2>Members List</h2>
                <p><i class="bi bi-person-fill"></i> Membership is open to all citizens of India & NRI's</p>

                <div class="list-group">
                    @foreach($users as $user)

                        <a href="#" class="list-group-item list-group-item-action">{{$user->id.'. '.$user->full_name}}</a>
                    @endforeach
                    {{--<a href="#" class="list-group-item list-group-item-action">A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>--}}

                </div>
            </div>

        </section>


    </main>


@endsection
