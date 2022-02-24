@extends('layouts.inner')

@section('content')

    <!-- login section -->
    <section class="ju-form">
        <div class="container px-3 ">

            @include('layouts.partials.alert')
            <h2>Account Dashboard</h2>
            <p></p>

            <form action="{{'/account/update-info'}}" method="POST" autocomplete="Off">

                <div class="mt-3">
                    <div class="mb-2">
                        <i class="bi bi-person-fill"></i> Account Number: {{'JU'.$authUser->id}}
                    </div>

                    <div>
                        <input type="hidden" name="_token" value="{{$_SESSION['csrf_token']}}" />
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
                                <select class="form-select" id="gender" name="gender" aria-label="Floating label select example">
                                    <option selected value="">Select Gender</option>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender}}" {{$authUser->gender==$gender ?'selected':''}}>{{$gender}}</option>
                                    @endforeach
                                    {{--<option value="Male" {{isset($arr['gender']) && $arr['gender']=='Male' ?'selected':''}}>Male</option>
                                    <option value="Female" {{isset($arr['gender']) && $arr['gender']=='Female' ?'selected':''}}>Female</option>
                                    <option value="Other" {{isset($arr['gender']) && $arr['gender']=='Other' ?'selected':''}}>Other</option>--}}
                                </select>
                                <label for="gender">Gender</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="dob" name="dob" value="{{$authUser->dob ?? ''}}" placeholder="Date of Birth">
                                <label for="dob">Birthday</label>
                            </div>
                        </div>
                        {{--<div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="age-group" name="age" aria-label="Floating label select example">
                                    <option selected>Select Age</option>
                                    <option value="15-25">15-25 yrs</option>
                                    <option value="25-35">25-35 yrs</option>
                                    <option value="35-45">35-45 yrs</option>
                                    <option value="45-55">55-65 yrs</option>
                                    <option value="65-75">65-75 yrs</option>
                                    <option value="75+">75+ yrs</option>
                                </select>
                                <label for="age-group">Age Group</label>
                            </div>
                        </div>--}}
                    </div>
                    {{--End Gender row--}}

                    {{--Religion Row--}}
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="religion" name="religion" aria-label="Floating label select example">
                                    <option selected value="">Select Religion</option>
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->name}}" {{$authUser->religion==$religion->name ?'selected':''}}>{{$religion->name}}</option>
                                    @endforeach
                                </select>
                                <label for="religion">Religion</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="language" name="language" aria-label="Floating label select example">
                                    <option selected value="">Select Language</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->text}}" {{$authUser->language==$language->text ?'selected':''}}>{{$language->text}}</option>
                                    @endforeach

                                </select>
                                <label for="language">Mother Tongue</label>
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
                                <input type="email" class="form-control" id="email" placeholder="name@example.com" value="{{$authUser->email}}" disabled>
                                <label for="email">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$authUser->mobile ?? ''}}" placeholder="Mobile number">
                                <label for="mobile">Mobile</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$authUser->whatsapp ?? ''}}" placeholder="Whatsapp number">
                                <label for="whatsapp">Whatsapp</label>
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
                                <select class="form-select" id="state" name="state" aria-label="Floating label select example">
                                    <option selected value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->text}}" data-id="{{$state->id}}" {{$authUser->state==$state->text ?'selected':''}}>{{$state->text}}</option>
                                    @endforeach
                                </select>
                                <label for="state">State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="district" name="district" aria-label="Floating label select example">
                                    <option selected value="{{($authUser->district!='')?$authUser->district:''}}">{{($authUser->district!='')?$authUser->district:'Select District'}}</option>
                                    {{--@foreach($religions as $religion)
                                        <option value="{{$religion->name}}">{{$religion->name}}</option>
                                    @endforeach--}}
                                </select>
                                <label for="district">District</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="constituency" name="constituency" aria-label="Floating label select example">
                                    <option selected value="{{($authUser->constituency!='')?$authUser->constituency:''}}">{{($authUser->constituency!='')?$authUser->constituency:'Select Constituency'}}</option>
                                    {{-- @foreach($religions as $religion)
                                         <option value="{{$religion->name}}">{{$religion->name}}</option>
                                     @endforeach--}}
                                </select>
                                <label for="constituency">Constituency</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5">
                    <div class="mb-2">
                        <i class="bi bi-person-fill"></i> Add your social links:
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="facebook username" value="{{$authUser->facebook}}">
                                <label for="facebook">{{'https://www.facebook.com/'}}<span id="facebook_handle">{{$authUser->facebook}}</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{$authUser->twitter}}" placeholder="twitter username">
                                <label for="twitter">{{'https://www.twitter.com/'}}<span id="twitter_handle">{{ ($authUser->twitter)? $authUser->twitter:'your_username'}}</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{$authUser->instagram}}" placeholder="instagram username">
                                <label for="instagram">{{'https://www.instagram.com/'}}<span id="instagram_handle">{{$authUser->instagram}}</span></label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-grid gap-2 col-6 mx-auto mt-5">
                    <button class="btn btn-success btn-lg" type="submit" name="update-info-submit">Update</button>
                </div>


            </form>
        </div>
    </section>
    <!-- login ends -->

@endsection


@section('extra_js')
    <script>

        $(document).ready(function(){

            $('#state').on('change', function(){
                // var stateId = $(this).children("option:selected").val();
                var stateId = $(this).find(':selected').data('id');
                console.log(stateId);
                if(stateId){
                    $.ajax({
                        type:'POST',
                        url:'/ajax/selectDistrict',
                        data:{
                            state_id:stateId
                        },
                        dataType: "json",
                        success:function(data,status){
                            //console.log(data);
                            //console.log(status);
                            $('#district').html(data.opt);
                        }
                    });
                }else{
                    $('#district').html('<option value="">Select state first</option>');
                }
            });

            $('#state').on('change', function(){
                // var stateId = $(this).children("option:selected").val();
                var stateId = $(this).find(':selected').data('id');
                console.log(stateId);
                if(stateId){
                    $.ajax({
                        type:'POST',
                        url:'/ajax/selectConstituency',
                        data:{
                            state_id:stateId
                        },
                        dataType: "json",
                        success:function(data,status){
                            //console.log(data);
                            //console.log(status);
                            $('#constituency').html(data.opt);
                        }
                    });
                }else{
                    $('#constituency').html('<option value="">Select state first</option>');
                }
            });

        });

        // Onchange facebook
        const source_facebook = document.getElementById('facebook');
        const result_facebook = document.getElementById('facebook_handle');

        const inputHandlerFacebook = function(e) {
            result_facebook.innerHTML = e.target.value;
        }

        source_facebook.addEventListener('input', inputHandlerFacebook);
        source_facebook.addEventListener('propertychange', inputHandlerFacebook);


        // Onchange twitter
        const source_twitter = document.getElementById('twitter');
        const result_twitter = document.getElementById('twitter_handle');

        const inputHandlerTwitter = function(e) {
            result_twitter.innerHTML = e.target.value;
        }

        source_twitter.addEventListener('input', inputHandlerTwitter);
        source_twitter.addEventListener('propertychange', inputHandlerTwitter);


        // onchange instagram
        const source_instagram = document.getElementById('instagram');
        const result_instagram = document.getElementById('instagram_handle');

        const inputHandlerInstagram = function(e) {
            result_instagram.innerHTML = e.target.value;
        }

        source_instagram.addEventListener('input', inputHandlerInstagram);
        source_instagram.addEventListener('propertychange', inputHandlerInstagram);

    </script>
@endsection
