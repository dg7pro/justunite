
<!-- ======= Top Bar ======= -->
<div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            {{--<i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">justuniteindia@gmail.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +91 8887610230--}}
            @if($authUser)
                <i class="bi bi-person-fill"></i><a href="{{'/dashboard'}}">{{$authUser->full_name}}</a>
                <i class="bi bi-gear-fill phone-icon"></i><a href="javascript:void(0)" onclick="return showLanguageModal()"> {{$temple['language']}} </a>
            @else
                <i class="bi bi-person-fill"></i><a href="{{'/register'}}">{{$temple['welcome']}}: {{$temple['guest']}} </a>
                <i class="bi bi-gear-fill phone-icon"></i><a href="javascript:void(0)" onclick="return showLanguageModal()"> {{$temple['language']}} </a>
            @endif
        </div>
        <div class="cta d-none d-md-block">
            @if($authUser)
                @if($authUser->is_admin)
                    <a href="{{'/admin'}}">{{$temple['admin']}}</a>
                @endif
                <a href="{{'/logout'}}">{{$temple['logout']}}</a>
            @else
                <a href="{{'/login'}}">{{$temple['login']}}</a>
            @endif
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
{{--<header id="header" class="fixed-top d-flex align-items-center header-inner-pages" style="background: rgba(182, 76, 75, 0.9);">--}}
<header id="header" class="fixed-top d-flex align-items-center header-inner-pages" style="background: rgba(218, 77, 73, 0.9);">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{'/'}}">{{$temple['site']}}</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link" href="{{'/'}}">{{$temple['home']}}</a></li>
                <li><a class="nav-link" href="{{'/#about'}}">{{$temple['about']}}</a></li>
                <li><a class="nav-link" href="{{'/#problems'}}">{{$temple['problems']}}</a></li>
                <li><a class="nav-link" href="{{'/#works'}}">{{$temple['works']}}</a></li>
                <li><a class="nav-link" href="{{'/#team'}}">{{$temple['team']}}</a></li>
                <li><a class="nav-link" href="{{'/#members'}}">{{$temple['members']}}</a></li>
                <li><a class="nav-link" href="{{'/blog'}}">{{$temple['blog']}}</a></li>
                <li><a class="nav-link" href="{{'/donate'}}">{{$temple['donate']}}</a></li>
                {{--<li><a class="nav-link" href="{{'/#contact'}}">{{$temple['contact']}}</a></li>--}}
                @if($authUser)
                    <li><a class="nav-link" href="{{'/logout'}}">{{$temple['logout']}}</a></li>
                @else
                    <li><a class="nav-link" href="{{'/login'}}">{{$temple['login']}}</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
