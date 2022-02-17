@extends('layouts.app')

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
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" data-bs-interval="30000" class="container carousel carousel-fade" data-bs-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
{{--                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Just Unite</span></h2>--}}
                    <h2 class="animate__animated animate__fadeInDown">{{$temple['heading1']}}</h2>
                    <p class="animate__animated animate__fadeInUp">{{$temple['slider1']}}</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{$temple['readmore']}}</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">{{$temple['heading2']}}</h2>
{{--                    <p class="animate__animated animate__fadeInUp">Just Unite is call to all the Indians and people of Indian origin to come together on single platform to discuss all the problems which India is currently facing right now. It's time we sit together & find a final solution to all our problems </p>--}}
                    <p class="animate__animated animate__fadeInUp">{{$temple['slider2']}}</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{$temple['readmore']}}</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">{{$temple['heading3']}}</h2>
                    <p class="animate__animated animate__fadeInUp">{{$temple['slider3']}}</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{$temple['readmore']}}</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Icon Boxes Section ======= -->
        <section id="icon-boxes" class="icon-boxes">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                        <div class="icon-box color-3">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">{{$temple['bh1']}}</a></h4>
                            <p class="description">{{$temple['box1']}}</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box color-2">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">{{$temple['bh2']}}</a></h4>
                            <p class="description">{{$temple['box2']}}</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box color-4">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">{{$temple['bh3']}}</a></h4>
                            <p class="description">{{$temple['box3']}}</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box color-1">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4 class="title"><a href="">{{$temple['bh4']}}</a></h4>
                            <p class="description">{{$temple['box4']}}</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Icon Boxes Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2 class="headi">{{$temple['aboutus']}}</h2>
                    <p>{{$temple['au_tag']}}</p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        {!! $temple['au_matter1'] !!}

                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        {!! $temple['au_matter2'] !!}

                        <a href="{{'/home/president-message'}}" class="btn-learn-more">{{$temple['president_msg']}}</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Clients Section ======= -->
        <!-- <section id="clients" class="clients">
          <div class="container" data-aos="zoom-in">

            <div class="clients-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
        </section> -->
        <!-- End Clients Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-5 align-items-stretch position-relative video-box" style='background-image: url("/assets/img/interview.jpg");' data-aos="fade-right">
                        <a href="javascript:void(0)" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

                        <div class="content">
                            <h3>{{$temple['why1']}} <strong class="text-maroon">{{$temple['why2']}}</strong></h3>
                            <!-- <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p> -->
                            <p>
                                {{$temple['no_doubt']}}
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li data-aos="fade-up" data-aos-delay="100">
                                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>{{ $temple['point1'] }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            {{$temple['p1_explain']}}
                                        </p>
                                    </div>
                                </li>

                                <li data-aos="fade-up" data-aos-delay="200">
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>{{$temple['point2']}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            {{$temple['p2_explain']}}
                                        </p>
                                    </div>
                                </li>

                                <li data-aos="fade-up" data-aos-delay="300">
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>{{$temple['point3']}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            {{$temple['p3_explain']}}
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="problems" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{$temple['problems']}}</h2>
                    <p>{{ $temple['problems_title'] }} </p>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <!-- <i class="bi bi-card-checklist"></i> -->
                            <i class="bi bi-people pinkc"></i>
                            <h4><a href="javascript:void(0)">{{$temple['major1']}}</a></h4>
                            <p>{{$temple['major1_explain']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <i class="bi bi-bar-chart bluec"></i>
                            <h4><a href="javascript:void(0)">{{$temple['major2']}}</a></h4>
                            <p>{{$temple['major2_explain']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-graph-up-arrow yellowc"></i>
                            <h4><a href="javascript:void(0)">{{$temple['major3']}}</a></h4>
                            <p>{{$temple['major3_explain']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-moon-stars orangec"></i>
                            <h4><a href="javascript:void(0)">{{$temple['major4']}}</a></h4>
                            <p>{{$temple['major4_explain']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-calendar4-week greenc"></i>
                            <h4><a href="javascript:void(0)">{{$temple['major5']}}</a></h4>
                            <p>{{$temple['major5_explain']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="icon-box">
                            <i class="bi bi-briefcase violetc"></i>
                            <h4><a href="javascript:void(0)">{{$temple['major6']}}</a></h4>
                            <p>{{$temple['major6_explain']}}</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="row" data-aos="zoom-in">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>{{$temple['whatsapp_enquiry']}}</h3>
                        <p> {{$temple['wa_en_title']}}</p>
                           {{-- <p> Want to know more about us? Click on the whatsapp enquiry button to send your request, and we will reply you back - your every single query: </p>--}}
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="https://wa.me/7565097233?text=I'm%20interested%20to%20know%20more%20about%20Just%20Unite">{{$temple['wa']}}</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Portfoio Section ======= -->
        <section id="works" class="portfoio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{$temple['works']}}</h2>
                    <p>{{$temple['works_sh']}}</p>
                </div>

                <div class="row portfolio-container">

                    @foreach($images as $img)

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{'assets/img/portfolio/'.$img->name}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$img->title}}</h4>
                            <p>{{$img->description}}</p>
                            {{--<a href="{{'assets/img/portfolio/'.$img->name}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$img->description}}"><i class="bx bx-plus"></i></a>--}}
                            {{--<a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                        </div>
                    </div>

                    @endforeach

                </div>

            </div>
        </section><!-- End Portfoio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{$temple['incharge']}}</h2>
                    <p>{{$temple['incharge_sh']}}</p>
                </div>

                <div class="row">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/sri_brijesh_rai.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{$temple['leader1_name']}}</h4>
                                <span>{{$temple['leader1_title']}}</span>
                                <p>{{$temple['leader1_about']}}</p>
                                <div class="social">
                                    <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-instagram-fill"></i></a>
                                    <a href="javascript:void(0)"> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/leader-2.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{$temple['leader2_name']}}</h4>
                                <span>{{$temple['leader2_title']}}</span>
                                <p>{{$temple['leader2_about']}}</p>
                                <div class="social">
                                    <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-instagram-fill"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="members" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{$temple['membership']}}</h2>
                    <p>{{$temple['ms_title']}}</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="box jubox-1">
                            <h3>{{$temple['volunteer']}}</h3>
                            {!! $temple['volunteer_about'] !!}
                            <div class="btn-wrap">
                                <a href="{{'/register/index'}}" class="btn-buy">{{$temple['join_us']}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box jubox-2">
                            <h3>{{$temple['core']}}</h3>
                            {!! $temple['core_about'] !!}

                            <div class="btn-wrap">
                                <a href="{{'/register/index'}}" class="btn-buy">{{$temple['join_us']}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box jubox-3">
                            <h3>{{$temple['observers']}}</h3>
                            {!! $temple['observers_about'] !!}

                            <div class="btn-wrap">
                                <a href="{{'/register/index'}}" class="btn-buy">{{$temple['join_us']}}</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{$temple['faq_heading']}}</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">{{$temple['faq1']}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    {{$temple['faq1_ans']}}
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">{{$temple['faq2']}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    {{$temple['faq2_ans']}}
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">{{$temple['faq3']}}  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    {{$temple['faq3_ans']}}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{$temple['contact_us']}}</h2>
                </div>

                <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

                    <div class="col-lg-5">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>{{$temple['location']}}</h4>
                                <p>{{$temple['address']}}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>{{$temple['email']}}</h4>
                                <p>{{$temple['mail']}}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>{{$temple['call']}}</h4>
                                <p>{{$temple['phone_no']}}</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                        <form action="javascript:void(0)" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{$temple['your_name']}}" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{$temple['your_email']}}" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="{{$temple['subject']}}" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="{{$temple['msg']}}" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">{{$temple['send_msg']}}</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

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
