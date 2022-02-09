@extends('layouts.inner')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                </ol>
                <h2>Blog Single</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{'/assets/img/blog/'.$blog->image}}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="javascript:void(0)">{{$blog->title}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$blog->writer}}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$blog->dated}}</time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{$blog->comments}} Comments</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                {!! $blog->content !!}
                            </div>

                            <div class="entry-footer">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="javascript:void(0)">Just Unite</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="javascript:void(0)">Integrity</a></li>
                                    <li><a href="javascript:void(0)">Unity</a></li>
                                    <li><a href="javascript:void(0)">Equality</a></li>
                                </ul>
                            </div>

                        </article><!-- End blog entry -->

                        <div class="blog-author d-flex align-items-center">
                            <img src="{{'/assets/img/team/'.$blog->avatar}}" class="rounded-circle float-left" alt="">
                            <div>
                                <h4>{{$blog->writer}}</h4>
                                <div class="social-links">
                                    <a href="{{'https://twitters.com/'.$blog->twitter}}"><i class="bi bi-twitter"></i></a>
                                    <a href="{{'https://facebook.com/'.$blog->facebook}}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{'https://instagram.com/'.$blog->instagram}}"><i class="biu bi-instagram"></i></a>
                                </div>
                                <p>
                                   {{$blog->about}}
                                </p>
                            </div>
                        </div><!-- End blog author bio -->


                    </div><!-- End blog entries list -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->



    </main>


@endsection
