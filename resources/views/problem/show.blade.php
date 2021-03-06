@extends('layouts.master')


@section('meta-tags')

    <meta property="fb:app_id" content="131336294384114" />

@endsection

@section('content')
    @include('layouts.partials.fb-comment')
    <div class="jumbotron color2">
        <div class="container">
            <h2 class="display-4">{{$problem->title}}</h2>
            <p><b>Do not vote for the leader who cannot solve these listed 27 problems</b></p>
            {{--<p><a href="#" role="button" class="btn btn-outline-warning" >Learn more &raquo;</a></p>--}}
            <p><a href="{{url('problems')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>{{$problem->title}}
                @can('manage_site')
                    <a href="{{url('problems/'.$problem->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                    {{--<form method="POST" action="{{url('problems/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>--}}
                @endcan
                </h2>
                {{--<img src="{{asset('images/problems/'.$problem->image)}}" alt="Over Population" width="100%">--}}
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    @if(count($images))
                        <ol class="carousel-indicators">
                            @foreach($images as $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->iteration == 1 ? 'active' : ''}}"></li>
                            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($images as $image)
                                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : ''}}">
                                   {{-- <img class="d-block w-100" src="{{asset('images/svg/'.$image->name)}}" alt="First slide">--}}
                                    <img class="d-block w-100" src="{{asset('storage/'.$image->name)}}" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$image->heading}}</h5>
                                        <p>{{$image->caption}}</p>
                                    </div>
                                </div>
                            @endforeach
                           {{-- <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('images/svg/second.svg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('images/svg/third.svg')}}" alt="Third slide">
                            </div>--}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @else
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('storage/default.svg')}}" alt="First slide">
                            </div>
                            {{-- <div class="carousel-item">
                                 <img class="d-block w-100" src="..." alt="Second slide">
                             </div>
                             <div class="carousel-item">
                                 <img class="d-block w-100" src="..." alt="Third slide">
                             </div>--}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </div>

                <br>
                <br>
                <div>
                    {!! $problem->notes !!}
                </div>
                <br>
                <div>
                    @php
                        $previous = $problem->id - 1 ;
                        $next = $problem->id + 1 ;
                    @endphp

                    @if($previous == 0)
                        <a role="button" class="btn btn-outline-info btn-sm pull-left the-end" >&laquo; Previous </a>
                    @else
                        <a href="{{url('problems/'.$previous)}}" role="button" class="btn btn-outline-info btn-sm pull-left" >&laquo; Previous </a>
                    @endif

                    @if($next > $problemCount)
                        <a role="button" class="btn btn-outline-info btn-sm pull-right the-end" >Next &raquo;</a>
                    @else
                        <a href="{{url('problems/'.$next)}}" role="button" class="btn btn-outline-info btn-sm pull-right" >Next &raquo;</a>
                    @endif
                </div>





                <br>
                <br>
                @can('manage_site')
                <hr>
                <div>
                    <h3>Upload Image</h3>
                    <br>
                    <form method="post" action="{{url('problems/'.$problem->id.'/upload-image')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputFile">Your Image:</label>
                            <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input.
                                It's a bit lighter and easily wraps to a new line.</small>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Heading:</label>
                            <div class="">
                                <input class="form-control" type="text" name="heading" value="Artisanal kale" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Caption:</label>
                            <div class="">
                                <input class="form-control" type="text" name="caption" value="Artisanal kale" id="example-text-input">
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit Image</button>
                        </div>
                    </form>
                </div>
                <br><br>
                    @if($images->count())
                <div>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Images</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Del</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">{{ $image->name }}</th>
                                <td scope="row">
                                    <a href="{{url('images/'.$image->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </td>
                                <td scope="row">
                                    <form method="POST" action="{{url('images/'.$image->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @endcan

                {{--<div class="fb-comments" data-href="http://localhost/justunite/public/problems/{{$problem->id}}" data-width="100%" data-numposts="5"></div>--}}
                <div class="fb-comments" data-href="http://www.justunite.org/problems/{{$problem->id}}" data-width="100%" data-numposts="5"></div>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script type="text/javascript">
        $('.the-end').on('click', function () {
            $.alert({
                title: 'The End !',
                content: 'You have reached the edge !',
                type: 'red'
            });
        });
    </script>
    <script>
        function ConfirmDelete(){

            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
