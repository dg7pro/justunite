@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h2 class="display-4">Just Unite</h2>
            <h2 class="display-4">जस्ट यूनाइट</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">

                <div id="{{$hiContent->slug}}">

                    <div class="alert alert-secondary" role="alert">
                        <h3 class="alert-heading">
                            {{$hiContent->title}}
                            <a href="#english" role="button" class="btn btn-outline-secondary js-scroll-trigger">Read in English</a>
                        </h3>
                    </div>

                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    {!! $hiContent->matter !!}
                </div>

                <hr>

                <div id="{{$engContent->slug}}">

                    <div class="alert alert-info" role="alert">
                        <h3 class="alert-heading">
                            {{$engContent->title}}
                            <a href="#hindi" role="button" class="btn btn-outline-info js-scroll-trigger">Read in Hindi</a>
                        </h3>
                    </div>

                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    {!! $engContent->matter !!}
                </div>

                <br>
                <br>
            </div>

            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>

        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });

    </script>

@endsection
