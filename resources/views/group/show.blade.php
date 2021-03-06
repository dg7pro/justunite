@extends('layouts.master')

@section('content')
    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">{{$group->name}}</h1>
            <p>{{$group->description}}</p>
            <p><a class="btn btn-primary btn-lg" href="{{url('group/elect-president')}}" role="button">Elect President &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Show Particular Group</h2>
                {{$group}}


                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>

                <br>
                <br>
                <br>


            </div>
        </div>
    </div>
@endsection