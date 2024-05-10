        <footer class="main-footer">
            <div class="main-footer__bg" id="main-footer-bg-image"
                style="background-image: url(assets/images/shapes/footer-bg-1.png)"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-5 wow fadeInUp" data-wow-delay="100ms">
                        <div class="main-footer__about">
                            <a href="{{ route('home') }}" class="main-footer__logo">
                                <img src="assets/images/wingslogo-white.png" alt="eduact" width="111"
                                    height="96" /> </a><!-- /.footer-logo -->
                            <p class="main-footer__about__text">
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </p>
                            <div class="main-footer__social">
                                <a href="https://www.facebook.com/wlcbd"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/company/wings-learning-centre/?originalSubdomain=bd"><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.youtube.com/channel/UCDPvD8tQXlLe_NLlpI9MhOQ"><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                            <!-- /.footer-social -->
                        </div>
                        <!-- footer-top -->
                    </div>
                    <div class="col-xl-3 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="main-footer__navmenu main-footer__widget01">
                            <h3 class="main-footer__title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Latest Courses</a></li>
                                <li><a href="#">Mission & Vision</a></li>
                                <li><a href="#">Our Approach</a></li>
                                <li><a href="#">Exclusive Advisors</a></li>
                                <li><a href="#">Join a Carrer</a></li>
                                {{-- <li><a href="/test">Payment Test</a></li> --}}
                            </ul>

                        </div>
                        <!-- /.footer-menu -->
                    </div>
                    <div class="col-xl-2 col-md-3 wow fadeInUp" data-wow-delay="300ms">
                        <div class="main-footer__navmenu main-footer__widget02">
                            <h3 class="main-footer__title">Explore</h3>
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="#">Upcoming Events</a></li>
                                <li><a href="#">Blog & News</a></li>
                                <li><a href="#">FAQ Question</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                            <!-- /.list-unstyled -->
                        </div>
                        <!-- /.footer-menu -->
                    </div>
                    <div class="col-xl-4 col-md-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="main-footer__newsletter">
                            <h3 class="main-footer__title">Contact Us</h3>
                            <ul class="main-footer__info-list">
                                <li>
                                    <span class="icon-Location"></span>House # 55, Road # 4/A,
                                    Dhanmondi, Dhaka-1209
                                </li>
                                <li>
                                    <span class="icon-Telephone"></span><a href="tel:3035550105">+(880)
                                        187-774-0088</a>
                                </li>
                                <li>
                                    <span class="icon-Email"></span><a
                                        href="mailto:michael.mitc@example.com">info@wings.com.bd</a>
                                </li>
                            </ul>
                            <form class="main-footer__email-box mc-form" data-url="MC_FORM_URL" novalidate="novalidate">
                                <div class="main-footer__email-input-box">
                                    <input type="email" placeholder="Email Address" name="EMAIL" />
                                </div>
                                <button type="submit" class="eduact-btn">
                                    <span class="eduact-btn__curve"></span>Subscribe
                                </button>
                            </form>
                            <div class="mc-form__response"></div>
                        </div>
                        <!-- /.footer-mailchimp -->
                    </div>
                    <div class="mt-4 flex w-full items-center justify-center">
                        <span><span><img
                                    style="
                      display: block;
                      max-width: 100%;
                      width: initial;
                      height: initial;
                      background: none;
                      opacity: 1;
                      border: 0;
                      margin: 0;
                      padding: 0;
                      margin-top: 30px;
                    "
                                    alt="" aria-hidden="true"
                                    src="assets/images/sslcommerz-banner.png" /></span></span>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /.main-footer -->

        <section class="copyright text-center">
            <div class="container wow fadeInUp" data-wow-delay="400ms">
                <p class="copyright__text">
                    Copyright ©<span class="dynamic-year"></span><!-- /.dynamic-year -->
                    | All Rights Reserved.
                </p>
                <p class="copyright__text">
                    Powered By
                    <!-- /.dynamic-year -->
                    <span style="color: red">Sheba Capital Limited.</span>
                </p>
            </div>
            <!-- /.container -->
        </section>
        <!-- /.copyright -->
