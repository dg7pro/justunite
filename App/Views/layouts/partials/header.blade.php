
<!-- ======= Top Bar ======= -->
<div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            @if($authUser)
                <i class="bi bi-person-fill"></i><a href="javascript:void(0)">{{$authUser->full_name}}</a>
                <i class="bi bi-gear-fill phone-icon"></i><a href="javascript:void(0)" onclick="return showLanguageModal()"> {{$temple['language']}} </a>
            @else
                <i class="bi bi-person-fill"></i><a href="{{'/register/index'}}">{{$temple['welcome']}}: {{$temple['guest']}} </a>
                <i class="bi bi-gear-fill phone-icon"></i><a href="javascript:void(0)" onclick="return showLanguageModal()"> {{$temple['language']}} </a>
            @endif
{{--            <i class="bi bi-phone-fill phone-icon"></i> +91 8887610230--}}
{{--            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">justuniteindia@gmail.com</a>--}}
{{--            <i class="bi bi-phone-fill phone-icon"></i> +91 8887610230--}}
        </div>
{{--        @if($authUser)--}}
{{--            <div class="cta d-none d-md-block">--}}
{{--                <a href="{{'/account/logout'}}">Log out</a>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="cta d-none d-md-block">
            @if($authUser)
                @if($authUser->is_admin)
                    <a href="{{'/admin/index'}}">{{$temple['admin']}}</a>
                @endif
                <a href="{{'/account/logout'}}">{{$temple['logout']}}</a>
            @else
                <a href="{{'/login/index'}}">{{$temple['login']}}</a>
            @endif
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{'/'}}">{{$temple['site']}}</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="{{'/#hero'}}">{{$temple['home']}}</a></li>
            <li><a class="nav-link scrollto" href="{{'/#about'}}">{{$temple['about']}}</a></li>
            <li><a class="nav-link scrollto" href="{{'/#problems'}}">{{$temple['problems']}}</a></li>
            <li><a class="nav-link scrollto" href="{{'/#works'}}">{{$temple['works']}}</a></li>
            <li><a class="nav-link scrollto" href="{{'/#team'}}">{{$temple['team']}}</a></li>
            <li><a class="nav-link scrollto" href="{{'/#members'}}">{{$temple['members']}}</a></li>
            <li><a class="nav-link" href="{{'/blog/index'}}">{{$temple['blog']}}</a></li>
            <li><a class="nav-link" href="{{'/home/donate'}}">{{$temple['donate']}}</a></li>
            <li><a class="nav-link scrollto" href="{{'/#contact'}}">{{$temple['contact']}}</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
</div>
</header>
<!-- End Header -->




