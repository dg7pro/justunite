
<!-- ======= Top Bar ======= -->
<div id="topbar" class="fixed-top d-flex align-items-center @if($requestUri!='/' || $requestUri!='/home/index') topbar-inner-pages @endif">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">justuniteindia@gmail.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +91 8887610230
        </div>
        <div class="cta d-none d-md-block">
            <a href="#about" class="scrollto">Get Started</a>
        </div>
    </div>
</div>

@if($requestUri!='/' || $requestUri!='/home/index')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-inner-pages" style="background: rgba(182, 76, 75);">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{'/'}}">Just Unite</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{'/home/index#home'}}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{'/home/index#about'}}">About</a></li>
                    <li><a class="nav-link scrollto" href="{{'/home/index#services'}}">Problems</a></li>
                    <li><a class="nav-link scrollto " href="{{'/home/index#works'}}">Works</a></li>
                    <li><a class="nav-link scrollto" href="{{'/home/index#team'}}">Team</a></li>
                    <li><a class="nav-link scrollto" href="{{'/home/index#members'}}">Members</a></li>
                    <li><a href="{{'/blog/index'}}">Blog</a></li>
                    <li><a href="#">Donate</a></li>
                    <li><a class="nav-link scrollto" href="{{'/home/index#contact'}}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
@else
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{'/'}}">Just Unite</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">{{$temple['home']}}</a></li>
                    <li><a class="nav-link scrollto" href="{{'#about'}}">About</a></li>
                    <li><a class="nav-link scrollto" href="{{'#services'}}">Problems</a></li>
                    <li><a class="nav-link scrollto " href="{{'#works'}}">Works</a></li>
                    <li><a class="nav-link scrollto" href="{{'#team'}}">Team</a></li>
                    <li><a class="nav-link scrollto" href="{{'#members'}}">Members</a></li>
                    <li><a href="{{'/blog/index'}}">Blog</a></li>
                    <li><a href="#">Donate</a></li>
                    @if($requestUri=='/')
                        <li><a href="#">Donate</a></li>
                    @else
                        <li><a href="#">{{$requestUri}}</a></li>
                    @endif
                    <li><a class="nav-link scrollto" href="{{'#contact'}}">Contact</a></li>

                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
             <ul>
               <li><a href="#">Drop Down 1</a></li>
               <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                 <ul>
                   <li><a href="#">Deep Drop Down 1</a></li>
                   <li><a href="#">Deep Drop Down 2</a></li>
                   <li><a href="#">Deep Drop Down 3</a></li>
                   <li><a href="#">Deep Drop Down 4</a></li>
                   <li><a href="#">Deep Drop Down 5</a></li>
                 </ul>
               </li>
               <li><a href="#">Drop Down 2</a></li>
               <li><a href="#">Drop Down 3</a></li>
               <li><a href="#">Drop Down 4</a></li>
             </ul>
           </li> -->

                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                      <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Drop Down 2</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                  </ul>
                </li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
@endif



