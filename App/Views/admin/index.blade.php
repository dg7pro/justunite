@extends('lays.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{'/admin/members'}}" class="btn btn-info">Members</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Templates</h5>
                        <p class="card-text">Manage templates in hindi and english languages</p>
                        <a href="{{'/admin/templates'}}" class="btn btn-warning">Templates</a>
{{--                        <a href="{{'/admin/templates?lang=english'}}" class="btn btn-warning">English</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{'/admin/blogs'}}" class="btn btn-success">Blog Articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


