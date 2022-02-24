@extends('layouts.inner')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{'/'}}">Home</a></li>
                    <li><a href="{{'/home/donate'}}">Donate</a></li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section>
            <div class="container">
                @include('layouts.partials.alert')

                <h2>Support Us</h2>
                <p><i class="bi bi-person-fill"></i>Your support is most welcomed, and will help us to transform India</p>

                <div>

                </div>
            </div>

        </section>


    </main>


@endsection
