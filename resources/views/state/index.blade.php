@extends('layouts.master')

@section('content')

    <div class="jumbotron color5">
        <div class="container">
            <h2 class="display-4">States</h2>
            <p><b>India consists of 29 states and 7 Union Territories including Delhi (NCR)</b></p>
            @if(Auth::guest())
                <p><a href="{{url('register')}}" role="button" class="btn btn-outline-dark" >Register &raquo;</a></p>

            @else
                <p><a class="btn btn-outline-dark" href="{{url('states/your-state')}}" role="button">Your State &raquo;</a></p>
            @endif

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>List of States</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name of State</th>
                        <th scope="col">Loksabha Seats</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($states as $state)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th><a href="{{url('states/'.$state->id)}}" class="text-primary">{{$state->name2}}</a></th>
                            <th class="text-primary">{{$state->constituencies_count}}</th>
                            @can('manage_site')
                                <th>
                                    <a href="{{url('states/'.$state->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </th>
                            @endcan
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <br>
                <br>
                <h3>List of UT</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name of Union Territory</th>
                        <th scope="col">Loksabha Seats</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($uts as $ut)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th><a href="{{url('states/'.$ut->id)}}" class="text-primary">{{$ut->name2}}</a></th>
                            <th class="text-primary">{{$ut->constituencies_count}}</th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                <br>
                @include('layouts.partials.track')
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="state"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: 'states/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            //console.log(data);
                            $('select[name="constituency"]').html('<option value="">Select Constituency</option>');
                            $.each(data, function(key, value) {
                                $('select[name="constituency"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="constituency"]').empty();
                }
            });
        });
    </script>
@endsection
