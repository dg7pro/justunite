<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>{{$temple['newsletter']}}</h4>
                    <p>{{$temple['newsletter_title']}}</p>
                </div>
                <div class="col-lg-6">
                    <form action="{{'/subscribe/add'}}" method="post">
                        <input type="email" name="email" placeholder="{{$temple['em_addr']}}"><input type="submit" value="{{$temple['subscribe']}}">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>{{$temple['links']}}</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{'/#hero'}}">{{$temple['home']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{'/about'}}">{{$temple['about']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{'/#problems'}}">{{$temple['problems']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['tos']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['pp']}}</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>{{$temple['imp_read']}}</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['members']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['problems']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['parties']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['media']}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">{{$temple['social_media']}}</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>{{$temple['contact_us']}}</h4>
                    <p>
{{--                        <a href="https://t.me/justunite" class="telegram" style="text-decoration: none; color: #fff3cd"><i class="bx bxl-telegram"></i> Telegram Channel</a> <br>--}}
                        <a href="https://t.me/justunite" class="telegram" style="text-decoration: none; color: #fff3cd">
                            <img src="{{'/assets/img/telegram.png'}}" alt="te" style="width: 24px; height: 24px;" class="me-2"> {{$temple['tg']}}</a> <br>

{{--                        <a href="https://chat.whatsapp.com/B6fmNkF0K1XE5OEaDuOzLl" class="telegram" style="text-decoration: none; color: #fff3cd"><i class="bx bxl-whatsapp"></i> Whatsapp Group</a> <br>--}}
                        <a href="https://www.kooapp/profile/justunite" class="koo" style="text-decoration: none; color: #fff3cd">
                            <img src="{{'/assets/img/koo.png'}}" alt="ko" style="width: 24px; height: 24px;" class="me-2"> {{$temple['ko']}}</a> <br>
                        <a href="https://chat.whatsapp.com/B6fmNkF0K1XE5OEaDuOzLl" style="text-decoration: none; color: #fff3cd">
                            <img src="{{'/assets/img/whatsapp-color.png'}}" alt="wa" style="width: 20px; height: 20px;" class="me-3">{{$temple['wa']}}</a> <br>

                        <br>
                        <strong>{{ $temple['phone'] }}</strong> {{ $temple['phone_no'] }}<br>
                        <strong>{{ $temple['email'] }}</strong> {{ $temple['mail'] }}<br>
                    </p>

                </div>

                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>{{ $temple['site'] }}</h3>
                    <p>{{ $temple['fmsg'] }}</p>
                    <div class="social-links mt-3">
                        <a href="javascript:void(0)" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="javascript:void(0)" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="javascript:void(0)" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="javascript:void(0)" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="javascript:void(0)" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
{{--            &copy; Copyright <strong><span>Just Unite Foundation</span></strong>. All Rights Reserved--}}
            {{$temple['copyright']}} <strong><span>{{$temple['ngo']}}</span></strong>. {{$temple['rights']}}
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/ -->
            {{$temple['designed_by'] }}<a href="javascript:void(0)"> {{ $temple['designer']}}</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
