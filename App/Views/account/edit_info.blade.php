@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3 ">

            @include('layouts.partials.alert')
            <h2>Add Details</h2>
            <p></p>

            <form action="">

                <div class="mt-3">
                    <div class="mb-2">
                        <i class="bi bi-person-fill"></i> Personal Information
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Your full name" value="{{$authUser->full_name}}" disabled>
                                <label for="floatingInput">Full name</label>
                            </div>
                        </div>
                    </div>

                    {{--Gender Row--}}
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected value=" ">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="floatingSelectGrid">Gender</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected>Select Age</option>
                                    <option value="15-25">15-25 yrs</option>
                                    <option value="25-35">25-35 yrs</option>
                                    <option value="35-45">35-45 yrs</option>
                                    <option value="45-55">55-65 yrs</option>
                                    <option value="65-75">65-75 yrs</option>
                                    <option value="75+">75+ yrs</option>

                                </select>
                                <label for="floatingSelectGrid">Age Group</label>
                            </div>
                        </div>
                    </div>
                    {{--End Gender row--}}

                    {{--Religion Row--}}
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected value=" ">Select Religion</option>
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->name}}">{{$religion->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Religion</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected>Select Mother Tongue</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->text}}">{{$language->text}}</option>
                                    @endforeach

                                </select>
                                <label for="floatingSelectGrid">Mother Tongue</label>
                            </div>
                        </div>
                    </div>
                    {{--End Religion row--}}
                </div>

                <div class="mt-5">
                    <div class="mb-2">
                        <i class="bi bi-person-fill"></i> Contact Info:
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="{{$authUser->email}}" disabled>
                                <label for="floatingInputGrid">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mobile number">
                                <label for="floatingInput">Mobile</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Whatsapp number">
                                <label for="floatingInput">Whatsapp</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5">
                    <div class="mb-2">
                        <i class="bi bi-person-fill"></i> Location Info:
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected value=" ">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->text}}">{{$state->text}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected value=" ">Select Religion</option>
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->name}}">{{$religion->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Religion</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected value=" ">Select Religion</option>
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->name}}">{{$religion->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Religion</label>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </section>
    <!-- login ends -->

@endsection