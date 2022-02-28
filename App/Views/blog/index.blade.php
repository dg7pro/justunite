@extends('layouts.inner')

@section('extra_css')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600");

        fieldset {
            margin: 0;
            padding: 2rem;
            box-sizing: border-box;
            display: block;
            border: none;
            /*border: solid 1px #CCC;*/
            min-width: 0;
            background-color: #FFF;
        }
        fieldset legend {
            margin: 0 0 1.5rem;
            padding: 0;
            width: 100%;
            float: left;
            display: table;
            font-size: 1.5rem;
            line-height: 140%;
            font-weight: 600;
            color: #333;
        }
        fieldset legend + * {
            clear: both;
        }

        body:not(:-moz-handler-blocked) fieldset {
            display: table-cell;
        }

        /* TOGGLE STYLING */
        .toggle {
            margin: 0 0 1.5rem;
            box-sizing: border-box;
            font-size: 0;
            display: flex;
            flex-flow: row nowrap;
            justify-content: flex-start;
            align-items: stretch;
        }
        .toggle input {
            width: 0;
            height: 0;
            position: absolute;
            left: -9999px;
        }
        .toggle input + label {
            margin: 0;
            padding: 0.75rem 2rem;
            box-sizing: border-box;
            position: relative;
            display: inline-block;
            border: solid 1px #DDD;
            background-color: #FFF;
            font-size: 1rem;
            line-height: 140%;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 0 0 rgba(255, 255, 255, 0);
            transition: border-color 0.15s ease-out, color 0.25s ease-out, background-color 0.15s ease-out, box-shadow 0.15s ease-out;
            /* ADD THESE PROPERTIES TO SWITCH FROM AUTO WIDTH TO FULL WIDTH */
            /*flex: 0 0 50%; display: flex; justify-content: center; align-items: center;*/
            /* ----- */
        }
        .toggle input + label:first-of-type {
            border-radius: 6px 0 0 6px;
            border-right: none;
        }
        .toggle input + label:last-of-type {
            border-radius: 0 6px 6px 0;
            border-left: none;
        }
        .toggle input:hover + label {
            border-color: #213140;
        }
        .toggle input:checked + label {
            background-color: #4B9DEA;
            color: #FFF;
            box-shadow: 0 0 10px rgba(102, 179, 251, 0.5);
            border-color: #4B9DEA;
            z-index: 1;
        }
        .toggle input:focus + label {
            outline: dotted 1px #CCC;
            outline-offset: 0.45rem;
        }
        @media (max-width: 800px) {
            .toggle input + label {
                padding: 0.75rem 0.25rem;
                flex: 0 0 50%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        /* STYLING FOR THE STATUS HELPER TEXT FOR THE DEMO */
        .status {
            margin: 0;
            font-size: 1rem;
            font-weight: 400;
        }
        .status span {
            font-weight: 600;
            color: #B6985A;
        }
        .status span:first-of-type {
            display: inline;
        }
        .status span:last-of-type {
            display: none;
        }
        @media (max-width: 800px) {
            .status span:first-of-type {
                display: none;
            }
            .status span:last-of-type {
                display: inline;
            }
        }

    </style>

@endsection


@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{'/'}}">Home</a></li>
                </ol>
                <h2>Blog</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        @foreach($blogs as $blog)
                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{'/assets/img/blog/'.$blog->image}}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    {{--<a href="{{'/blog/article?id='.$blog->id}}">{{$blog->title}}</a>--}}
                                    <a href="{{'/blog/'.$blog->ln.'/'.$blog->slug}}">{{$blog->title}}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript:void(0)">{{$blog->writer}}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript:void(0)"><time datetime="2021-01-01">{{$blog->dated}}</time></a></li>
                                        {{--<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="javascript:void(0)">{{$blog->comments}} Comments</a></li>--}}
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {!! $blog->first_para !!}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{'/blog/article?id='.$blog->id}}">{{$temple['readmore']}}</a>
                                    </div>
                                </div>
                            </article>
                            <!-- End blog entry -->
                        @endforeach

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div>

                    </div><!-- End blog entries list -->

                    {{--<div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="#">General <span>(25)</span></a></li>
                                    <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                    <li><a href="#">Travel <span>(5)</span></a></li>
                                    <li><a href="#">Design <span>(22)</span></a></li>
                                    <li><a href="#">Creative <span>(8)</span></a></li>
                                    <li><a href="#">Educaion <span>(14)</span></a></li>
                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                                    <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                                    <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                                    <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                                    <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                                    <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tags</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    <li><a href="#">App</a></li>
                                    <li><a href="#">IT</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Mac</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Office</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Studio</a></li>
                                    <li><a href="#">Smart</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div><!-- End sidebar tags-->

                        </div><!-- End sidebar -->

                    </div>--}}
                    <!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main>

    @include('modal.language_selector')

@endsection

@section('extra_js')
    <script>
        {{--        @if(!isset($_COOKIE['ju_user_language']))--}}
        {{--        $('#exampleModal').modal('show');--}}
        {{--        @endif--}}
        $(document).ready(function(){
            var flag = '{{$slm}}';
            if(flag==true){
                setTimeout(function() {
                    // $('#myModal').modal();
                    $('#exampleModal').modal('show');
                }, 2000);

            }


            $('#my-language-selector').on('click', function () {

                var lang = $("input[name='my_lang']:checked").val();
                console.log('reached');
                console.log(lang);

                $.ajax({
                    url: "/ajax/set-user-language",
                    method: 'post',
                    data: {
                        lang: lang
                    },
                    dataType: "json",
                    success: function (data) {
                        //var message = data.msg;
                        // setTimeout(function () {
                        //     toastr.success(data.msg);
                        // }, 500);
                        // console.log(data.msg);
                        // console.log(status);
                        console.log(data);
                        $('#exampleModal').modal('hide');
                        location.reload(true);
                    }
                });
            });

            // var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            // myModal.show();
        });

        function showLanguageModal(){
            $('#exampleModal').modal("show");
            //return false;
        }

    </script>
@endsection