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
                    <p class="animate__animated animate__fadeInUp">The mission to unite Hindus from across the world. When we say Hindus it is not just followers of Hindu Religion, it means people who originated between Himilayas in the north and Hind mahasagar in the south</p>
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
                    <p class="animate__animated animate__fadeInUp">Everyone of us has leadership qualities hidden within our hearts, everyone of us wants to serve our Motherland India. Let's Unite as Together only we can take the correct decisions and help India progress in right direction.  </p>
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
                            <h4 class="title"><a href="">Public Opinion</a></h4>
                            <p class="description">The way we work is through creating strong public opinion. What the Janta says is of paramount importance to us.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box color-2">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Strengthen Democracy</a></h4>
                            <p class="description">Collectively, we can strengthen the largest democracy of the world. And together only we can experiment new ideas.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box color-4">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Making Reforms</a></h4>
                            <p class="description">India needs Reform in every fields and directions. Not only in social, education, military but at it's core is Political reforms</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box color-1">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4 class="title"><a href="">Spread Hinduism</a></h4>
                            <p class="description">Spread of truth, submissivness, pease, enlightnement and knowledge. Offcourse world see India as Jagat Guru</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Icon Boxes Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2 class="headi">About Us</h2>
                    <p>Just unite is the group of patriots, who have highest level of love, devotion and feelings for their motherland India </p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Just unite is the group of patriotic personalities - individuals who have highest level of love,
                            devotion and feelings of sacrifice towards their motherland. Those who want to see India as stable
                            strengthen and self-sufficient nation recognized at international arena as super power.
                        </p>
                        <p>
                            The plight of India is that after 70 years of Independence our nation is still struggling with its problems
                            - whether it is - social issues of poverty, corruption, unemployment and mismanagement of resources by our
                            leaders or national issues such as Sri Ram Mandir, Kashmir problem or border dispute with neighbors.
                            It’s a time to find final solution of all our problems.
                        </p>
                        <!-- <ul>
                          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                          <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                        </ul> -->
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Thus Just Unite welcomes - laborers, workers, farmers, peasants, craftsmen, students, professionals,
                            employees, managers, businessmen and Intellectuals from every aspect of life - to put an end to their
                            sufferings. Just Unite invite all Indian to find the final solution of all their problems.
                        </p>
                        <p>
                            It is to be noted that Just Unite is not a political organization but at personal level it will support
                            Individuals and political parties having progressive and similar thinking.
                        </p>
                        <a href="what-is-just-unite.php" class="btn-learn-more">Learn More</a>
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
                        <a href="" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

                        <div class="content">
                            <h3>India is on verge of becoming <strong class="text-maroon">Super power but how?</strong></h3>
                            <!-- <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p> -->
                            <p>
                                No doubt India has regained it's past glory, freedom and self-sufficientness where the world sees it with respect and admiration. Nodoubt India is on verge of becoming next superpower but still some last efforts are needed:
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li data-aos="fade-up" data-aos-delay="100">
                                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>Organized, Systematic & Deciplined Nationality. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            Indians have strong sence of Nationalism and Patritoism. But their efforts are unorganized & un-united. Only united efforts can produce quick and great results.
                                        </p>
                                    </div>
                                </li>

                                <li data-aos="fade-up" data-aos-delay="200">
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>Conflict of Interest with that of Country. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Many a times political Leaders & parties work in their own interest, overseeing & bypassing the long drawn outcome and interests of the country, thus conflict starts.
                                        </p>
                                    </div>
                                </li>

                                <li data-aos="fade-up" data-aos-delay="300">
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>Feeling of solidarity, unity and oneness. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            When you see every other person as as your fellow country men, you can't take advantage of your position or power. There can be no seperatist movement or feelings if there is feeling of oneness.
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
                    <h2>The Problems</h2>
                    <p>What is needed to solve these major issues and many other problems in India is strong sense of unity, understanding and co-operation among different sections and classes of society together with stable government at center and state giving right directives. </p>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <!-- <i class="bi bi-card-checklist"></i> -->
                            <i class="bi bi-people pinkc"></i>
                            <h4><a href="#">Over Population</a></h4>
                            <p>Over exploding population will be the major problem for India in present century. Crisis of food and shelter will increase</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <i class="bi bi-bar-chart bluec"></i>
                            <h4><a href="#">Economic Disparity</a></h4>
                            <p>Though the per capita income will be quite satisfactory, the increasing gap between rich and poor is also alarming</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-graph-up-arrow yellowc"></i>
                            <h4><a href="#">Inflation</a></h4>
                            <p>Irrelavant flow of money in the economy causes sharp Inflation. With other problems price hike causes pressure on lower & middle class</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-moon-stars orangec"></i>
                            <h4><a href="#">Islamic Fundamentalism</a></h4>
                            <p>Increasing population to increase followers of religion. Fear of religious terrorism from outside and inside India is always present</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-calendar4-week greenc"></i>
                            <h4><a href="#">Unemployment</a></h4>
                            <p>Unemployemt will be the major issue, if upcoming governments in India, is unable to generate fresh opportunities for youth and control it</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="icon-box">
                            <i class="bi bi-briefcase violetc"></i>
                            <h4><a href="#">Corruption</a></h4>
                            <p>Corruption and bribery still exists in some form or the other. And another major problem is huge accumulation of black money by some</p>
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
                        <h3>Call To Action</h3>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="">Call To Action</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Portfoio Section ======= -->
        <section id="works" class="portfoio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Works</h2>
                    <p>Just the drop in the ocean but we had started our work in the year 2015 towords making India and this world a better place for every life. In year 2017 we registered this body at state level and in 2020 expansion took it to nation wide.</p>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/portfolio/neta-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Image 1</h4>
                            <p>Er. Dhananjay speaking on eradication of poverty in India</p>
                            <a href="assets/img/portfolio/neta-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Er. Dhananjay speaking on eradication of poverty in India"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <img src="assets/img/portfolio/neta-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/neta-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/portfolio/neta-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/neta-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="assets/img/portfolio/neta-4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/neta-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <img src="assets/img/portfolio/neta-5.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/neta-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/portfolio/neta-6.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/neta-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                      <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                      </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                      <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                      </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                      <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                      </div>
                    </div> -->

                </div>

            </div>
        </section><!-- End Portfoio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Incharge</h2>
                    <p>Please feel free to contact us. To know more about our vision and mission you can talk directly to any of our persons incharge. Or just whatsapp us with your views, suggestions or purpose and we will reply you back as soon as possible</p>
                </div>

                <div class="row">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/leader-1.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Sri Brijesh Rai</h4>
                                <span>National President ~ JU</span>
                                <p>Engineer from IIT Kanpur his guidance is boon for us</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/leader-2.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Er. Dhananjay Gupta</h4>
                                <span>National Secretary ~ JU</span>
                                <p>Software Engineer, with the keen interest in Social Reforms</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
                      <div class="member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                          <h4>William Anderson</h4>
                          <span>CTO</span>
                          <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                          <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                          </div>
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
                      <div class="member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                          <h4>Amanda Jepson</h4>
                          <span>Accountant</span>
                          <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                          <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                          </div>
                        </div>
                      </div>
                    </div> -->

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="members" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Membership</h2>
                    <p>If you have feelings for India and interested in doing something for your country, you are most welcome to join us, in serving the nation. According to your taste, involvement and interest there are 3 kind of members explained below:</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="box jubox-1">
                            <h3>Volunteer</h3>
                            <!-- <h4><sup>$</sup>0<span> / month</span></h4> -->
                            <!-- <ul>
                              <li>Aida dere</li>
                              <li>Nec feugiat nisl</li>
                              <li>Nulla at volutpat dola</li>
                              <li class="na">Pharetra massa</li>
                              <li class="na">Massa ultricies mi</li>
                            </ul> -->
                            <p>Volunters are the hands of the organization. Without Volunteers the life would be impossible. </p>
                            <p>In return they get tremendous amount of social experience and working certificate too.</p>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Join Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box jubox-2">
                            <h3>Core Members</h3>
                            <!-- <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                              <li>Aida dere</li>
                              <li>Nec feugiat nisl</li>
                              <li>Nulla at volutpat dola</li>
                              <li>Pharetra massa</li>
                              <li class="na">Massa ultricies mi</li>
                            </ul> -->
                            <p>Core members are the once who actively participate in the decesion making process of the organization.</p>
                            <p> Together they constitute Core Committee which decides the course of action to be taken and thus function as brain </p>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Join Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box jubox-3">
                            <h3>Observers</h3>
                            <!-- <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                              <li>Aida dere</li>
                              <li>Nec feugiat nisl</li>
                              <li>Nulla at volutpat dola</li>
                              <li>Pharetra massa</li>
                              <li>Massa ultricies mi</li>
                            </ul> -->
                            <p>Observers are the simple members. They support us with their knowledge, experience, and valuable feedback</p>
                            <p>Generally the decession is put before them and voting is conducted before taking any important decesion </p>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Join Us</a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                      <div class="box">
                        <span class="advanced">Advanced</span>
                        <h3>Ultimate</h3>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                          <li>Aida dere</li>
                          <li>Nec feugiat nisl</li>
                          <li>Nulla at volutpat dola</li>
                          <li>Pharetra massa</li>
                          <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                          <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                      </div>
                    </div> -->

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">How together we can transform India? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    We think that most of the problems in India, can be solved by mere involvement of everyone and thinking in right direction. Unity and peoples participation is key & major handle in acheiving our goals.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Is diversity boon or bane? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    From the very childhood we are taught that India is a diverse country and there is unity among diversity. But the truth is - there is no total unity on the ground instead there is vast conflict of Interest. Our organization as the name suggest, serves India by fostering unity among different sections of Indian society
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">How Just Unite helping India in building Unity? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    The one word answer is - by reducing chaos. Though there is great feelings of Nationality among Indians. Peoples are confused, the patterns are undecided, there is chaotic environment everywhere. Peoples don't know the long term effects of their current decesion. We need help form every intellectual Indians.
                                </p>
                            </div>
                        </li>

                        <!-- <li data-aos="fade-up" data-aos-delay="400">
                          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                          <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                            </p>
                          </div>
                        </li> -->

                        <!-- <li data-aos="fade-up" data-aos-delay="500">
                          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                          <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                            </p>
                          </div>
                        </li> -->

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

                    <div class="col-lg-5">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Noida, UP India</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>justuniteindia@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+91 888-76-10230</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
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
