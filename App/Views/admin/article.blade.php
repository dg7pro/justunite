@extends('lays.app')

@section('content')

    <div class="container mt-5">

        <!-- First Row  -->
        <div class="row mt-3 mb-5">
            <div class="col-lg-12">
                <h2>
                    {{$article['title']}}<a href="{{'/blog/article?cid='.$article['id']}}" target="_blank" class="ml-3"><i class="fas fa-external-link-alt"></i></a>
                </h2>

                <p class="mb-5">Administrator can only change matter of this article </p>

{{--                @include('layouts.partials.flash')--}}

                <div>
                    <form method="post" action="{{'/admin/save-article'}}">
                        <textarea id="mytextarea" style="height:50em" name="content">{{$article['content']}}</textarea>
                        <input type="hidden" name="article_id" value="{{$article['id']}}">
                        <button type="submit" name="update_article" class="btn btn-lg btn-dark mt-4">Update Content</button>
                    </form>
                </div>
            </div>
        </div>



    </div>


@endsection


@section('extra_js')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'mytextarea' );


    </script>

@endsection

