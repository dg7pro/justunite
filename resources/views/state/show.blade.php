@extends('layouts.master')

@section('content')
    <div class="jumbotron color5">
        <div class="container">
            <h2 class="display-4">{{$state->name2}}</h2>
            <p><b>Information about the {{$state->name2}} is given below. Active parties in the state and loksabha constituencies are also listed</b></p>
            <p><a class="btn btn-outline-dark" href="{{url('members')}}" role="button">All Members &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>{{$state->name2}}
                    @can('manage_site')
                        <a href="{{url('states/'.$state->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                    @endcan
                </h2>
                <div style="height: 70vh; overflow: auto">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-primary">The State of {{$state->name2}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><th>Name: </th><th>{{$state->name2}}</th></tr>
                        <tr><th>Capital: </th><th>{{$state->capital}}</th></tr>
                        <tr><th>Population: </th><th>{{number_format($state->population)}}</th></tr>
                        <tr><th>Language: </th><th>
                                @foreach($state->languages as $language)
                                    {{$language->name.',   '}}
                                @endforeach
                                {{'etc'}}
                                @can('manage_site')
                                    <a href="{{url('states/'.$state->id.'/list-languages')}}" role="button" class="btn btn-sm btn-outline-info">Attach</a>
                                @endcan

                            </th></tr>
                        <tr><th>Literacy: </th><th>{{$state->literacy. '%'}}</th></tr>

                        <tr><th>Lok Sabha Seats(PC): </th><th>{{$state->pc.' seats'}}</th></tr>
                        <tr><th>Vidhan Sabha Seats(AC): </th><th>{{$state->ac.' seats'}}</th></tr>
                        <tr><th>Chief Minister: </th><th>{{$state->cm}}</th></tr>
                        <tr>
                            <th>Ruling Party: </th>
                            <th>
                                @if($state->ruling)
                                    <a href="{{url('parties/'.$state->ruling->id)}}" class="text-primary">{{ $state->ruling->abbreviation }}</a>
                                @else
                                    {!! '<i>Unknown..</i>' !!}
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>Opposition Party: </th>
                            <th>
                                @if($state->opposition)
                                    <a href="{{url('parties/'.$state->opposition->id)}}" class="text-primary">{{ $state->opposition->abbreviation }}</a>
                                @else
                                    {!! '<i>Unknown..</i>' !!}
                                @endif
                            </th>
                        </tr>
                        <tr><th>Governor: </th><th>{{$state->governor}}</th></tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    @php
                        $previous = $state->id - 1 ;
                        $next = $state->id + 1 ;
                    @endphp
                    @if($previous == 0)
                        <a role="button" class="btn btn-outline-info btn-sm pull-left the-end" >&laquo; Previous </a>
                    @else
                        <a href="{{url('states/'.$previous)}}" role="button" class="btn btn-outline-info btn-sm pull-left" >&laquo; Previous </a>
                    @endif

                    @if($next > $stateCount)
                        <a role="button" class="btn btn-outline-info btn-sm pull-right the-end" >Next &raquo;</a>
                    @else
                        <a href="{{url('states/'.$next)}}" role="button" class="btn btn-outline-info btn-sm pull-right" >Next &raquo;</a>
                    @endif
                </div>
                <br>
                <br>
                <br>
                <h3>Active Parties in {{$state->name2}}
                    @can('manage_site')
                        <a href="{{url('states/'.$state->id.'/list-parties')}}" role="button" class="btn btn-sm btn-outline-info">Attach</a>
                    @endcan
                </h3>
                <div style="height: 50vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S No.</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Shortform</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        {{--@foreach($parties as $party)--}}
                        @foreach($state->parties as $party)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><img src="{{asset('icons/'.strtolower($party->abbreviation).'.jpg')}}"></td>
                                <td><a href="{{url('parties/'.$party->id)}}"><b class="text-primary">{{$party->name or 'null'}}</b></a></td>
                                <td><a href="{{url('parties/'.$party->id)}}"><b class="text-primary">{{$party->abbreviation or 'null'}}</b></a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <h3>Loksabha Constituencies</h3>
                <div style="height: 50vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Constituency Name</th>
                            <th scope="col">Type</th>
                            {{--<th scope="col">State</th>--}}
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($state->constituencies as $constituency)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{url('constituencies/'.$constituency->id)}}"><b class="text-primary">{{$constituency->pc_name}}</b> </a></td>
                                <td><b data-toggle="tooltip" title="{{$constituency->ctype->description}}" class="text-primary">{{$constituency->ctype->name}}</b></td>
                                {{--<td><a href="{{url('states/'.$state->id)}}">{{$state->name2}}</a></td>--}}
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('constituencies/'.$constituency->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <br>
                <br>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Track your CONSTITUENCY:</h4>
                    <br>
                    <form method="POST" action="{{url('constituency/track')}}">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Select State...</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">

                                    <select id="constituency" name="constituency" class="form-control">
                                        <option value="">Select State first...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Go to your Constituency</button>
                    </form>
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
    {{--<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>--}}
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    {{--<script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>--}}

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
    <script type="text/javascript">
        $('.the-end').on('click', function () {
            $.alert({
                title: 'The End !',
                content: 'You have reached the edge !',
                type: 'red'
            });
        });
    </script>

@endsection