@extends('layouts.master')

@section('content')

    <div class="container">
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-9">
                <br>
                <br>
                <h2>Create Gender</h2>

                <form method="POST" action="{{url('genders')}}">
                    {{ csrf_field() }}

                    {{--Tags--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Gender Name:</label>
                            <input type="text" name="name" id="name"  class="form-control" placeholder="Gender name...">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-info">Submit</button>
                </form>

                <br>
                <br>


                <br>
                <br>
            </div>
            <br>
            <br>
            <div class="col-md-3">
                @include('layouts.partials.dashboard-menu')
            </div>

        </div>
    </div>
@endsection