<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alumni Section</title>
    <meta name="description" content="Eduact HTML Template For Educaton & LMS" />
    @include('home.layouts.header')
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/wingslogo-loader.png)"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('home.layouts.navbar_2')
        <section class="page-header @@extraClassName" data-jarallax data-speed="0.3"
            data-imgPosition="50% -100%">
            <div class="page-header__bg jarallax-img"></div>
            <!-- /.page-header-bg -->
            <div class="page-header__overlay"></div>
            <!-- /.page-header-overlay -->
            <div class="container text-center">
                <h2 class="page-header__title">Alumni Section</h2>
                <!-- /.page-title -->
                <ul class="page-header__breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Alumni</span></li>
                </ul>
                <!-- /.page-breadcrumb list-unstyled -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.page-header -->
        <!-- About Start -->
        <section class="gallery-page">
            <div class="container">
                <div class="gallery-page__carousel eduact-owl__carousel eduact-owl__dots owl-theme owl-carousel"
                    data-owl-options='{
            "items": 3,
            "margin": 30,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": true,
            "nav":false,
            "dots":true,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],
            "responsive":{
                "0":{
                    "items":1,
                    "margin": 0
                },
                "700":{
                    "items": 2
                },
                "992":{
                    "items": 3
                },
                "1400":{
                    "margin": 36
                }
            }
            }'>
                    <!-- gallery-item-start -->
                    <div class="item">
                        <div class="gallery-page__single">
                            <img src="assets/images/gallery/gallery-1_1.jpg" alt="eduact">
                            <div class="gallery-page__icon">
                                <a class="img-popup" href="assets/images/gallery/gallery-1_1.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item-end -->
                    <!-- gallery-item-start -->
                    <div class="item">
                        <div class="gallery-page__single">
                            <img src="assets/images/gallery/gallery-2_2.jpg" alt="eduact">
                            <div class="gallery-page__icon">
                                <a class="img-popup" href="assets/images/gallery/gallery-2_2.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item-end -->
                    <!-- gallery-item-start -->
                    <div class="item">
                        <div class="gallery-page__single">
                            <img src="assets/images/gallery/gallery-3_2.jpg" alt="eduact">
                            <div class="gallery-page__icon">
                                <a class="img-popup" href="assets/images/gallery/gallery-3_2.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item-end -->
                    <!-- gallery-item-start -->
                    <div class="item">
                        <div class="gallery-page__single">
                            <img src="assets/images/gallery/gallery-4_2.jpg" alt="eduact">
                            <div class="gallery-page__icon">
                                <a class="img-popup" href="assets/images/gallery/gallery-4_2.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item-end -->
                    <!-- gallery-item-start -->
                    <div class="item">
                        <div class="gallery-page__single">
                            <img src="assets/images/gallery/gallery-5_2.jpg" alt="eduact">
                            <div class="gallery-page__icon">
                                <a class="img-popup" href="assets/images/gallery/gallery-5_2.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item-end -->
                    <!-- gallery-item-start -->
                    <div class="item">
                        <div class="gallery-page__single">
                            <img src="assets/images/gallery/gallery-6_2.jpg" alt="eduact">
                            <div class="gallery-page__icon">
                                <a class="img-popup" href="assets/images/gallery/gallery-6_2.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item-end -->
                </div>
            </div>
        </section>
        <!-- About End -->

        <!-- Testimonial Start -->
        <section class="testimonial-one">
            <div class="container">
                <div class="section-title text-center">
                    <h5 class="section-title__tagline">
                        Alumni Feedback
                        {{-- <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 133 13"
                fill="none"
              > --}}
                        <path
                            d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z"
                            fill="#F1F2FD" />
                        <path
                            d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z"
                            fill="#F1F2FD" />
                        </svg>
                    </h5>
                    <h2 class="section-title__title">What Our Alumni Speak</h2>
                </div>
                <!-- section-title -->
                <div class="testimonial-one__area">
                    <div class="testimonial-one__carousel eduact-owl__carousel owl-with-shadow owl-theme owl-carousel"
                        data-owl-options='{
                "items": 1,
                "margin": 0,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": true,
                "nav":true,
                "dots":false,
                "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"]
                }'>
                        <!-- Testimonial Item -->
                        <div class="item">
                            <div class="testimonial-one__item">
                                <div class="testimonial-one__author">
                                    <img src="assets/images/resources/testimonial-1-author-1_2.png" alt="eduact" />
                                </div>
                                <!-- testimonial-author -->
                                <div class="testimonial-one__content">
                                    <div class="testimonial-one__quote">
                                        Flexible Classes refers to the process of acquiring
                                        knowledge or skills through the use of digital
                                        technologies and the internet. Flexible Classes refers to
                                        the process flexible Classes refers to the process
                                    </div>
                                    <!-- testimonial-quote -->
                                    <div class="testimonial-one__meta">
                                        <h5 class="testimonial-one__title">Savannah Nguyen</h5>
                                        <span class="testimonial-one__designation">UI/UX Designer</span>
                                    </div>
                                    <!-- testimonial-meta -->
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial Item -->
                        <!-- Testimonial Item -->
                        <div class="item">
                            <div class="testimonial-one__item">
                                <div class="testimonial-one__author">
                                    <img src="assets/images/resources/testimonial-1-author-2_2.png" alt="eduact" />
                                </div>
                                <!-- testimonial-author -->
                                <div class="testimonial-one__content">
                                    <div class="testimonial-one__quote">
                                        Flexible Classes refers to the process of acquiring
                                        knowledge or skills through the use of digital
                                        technologies and the internet. Flexible Classes refers to
                                        the process flexible Classes refers to the process
                                    </div>
                                    <!-- testimonial-quote -->
                                    <div class="testimonial-one__meta">
                                        <h5 class="testimonial-one__title">Christine eve</h5>
                                        <span class="testimonial-one__designation">Web Developer</span>
                                    </div>
                                    <!-- testimonial-meta -->
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial Item -->
                        <!-- Testimonial Item -->
                        <div class="item">
                            <div class="testimonial-one__item">
                                <div class="testimonial-one__author">
                                    <img src="assets/images/resources/testimonial-1-author-3_2.png" alt="eduact" />
                                </div>
                                <!-- testimonial-author -->
                                <div class="testimonial-one__content">
                                    <div class="testimonial-one__quote">
                                        Flexible Classes refers to the process of acquiring
                                        knowledge or skills through the use of digital
                                        technologies and the internet. Flexible Classes refers to
                                        the process flexible Classes refers to the process
                                    </div>
                                    <!-- testimonial-quote -->
                                    <div class="testimonial-one__meta">
                                        <h5 class="testimonial-one__title">Sarah Taylor</h5>
                                        <span class="testimonial-one__designation">Seo Expert</span>
                                    </div>
                                    <!-- testimonial-meta -->
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial Item -->
                    </div>
                    <div class="testimonial-one__thumb wow fadeInUp" data-wow-delay="200ms">
                        <img src="assets/images/resources/banner-1-1.1.png" alt="eduact" />
                        <svg viewBox="0 0 612 563" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M595.211 330.916C584.04 315.536 581.185 295.533 588.393 277.948C591.708 269.857 593.359 260.893 592.899 251.505C591.377 220.18 566.027 194.704 534.708 192.994C534.495 192.982 534.283 192.971 534.071 192.959C520.328 192.346 507.517 185.776 499.106 174.89C498.458 174.053 497.809 173.215 497.148 172.39C485.069 157.234 481.695 137.196 487.463 118.703C489.268 112.9 490.07 106.661 489.634 100.174C487.923 74.7337 467.02 54.3769 441.54 53.2801C426.665 52.6432 413.147 58.4459 403.521 68.129C386.44 85.3367 363.449 95.4207 339.207 95.1495C338.429 95.1377 337.638 95.1377 336.86 95.1377C332.79 95.1377 328.803 95.2674 321.631 94.4418C300.244 91.9768 280.473 82.2348 264.76 67.5039C244.483 48.4916 216.997 37.063 186.846 37.7471C129.15 39.0563 80.9264 88.6391 79.2159 146.325C77.9301 189.774 109.827 226.101 118.757 239.239C145.441 278.431 123.193 329.536 93.867 364.199C75.677 385.7 64.8598 413.652 65.3434 444.14C66.3697 509.161 119.548 562.153 184.581 562.99C207.784 563.285 229.501 557.046 248.021 545.995C285.428 523.668 327.033 509.161 370.031 502.167C393.635 498.323 415.883 490.456 436.043 479.275C458.739 466.69 485.128 461.914 510.702 466.337C516.117 467.268 521.708 467.705 527.429 467.575C573.659 466.537 611.16 428.513 611.584 382.279C611.773 363.067 605.663 345.316 595.211 330.916Z"
                                fill="#000000" />
                            <path
                                d="M103.524 314.265C122.402 295.39 122.402 264.788 103.524 245.913C84.6458 227.038 54.038 227.038 35.1597 245.913C16.2814 264.788 16.2814 295.39 35.1597 314.265C54.038 333.14 84.6458 333.14 103.524 314.265Z"
                                fill="#000000" />
                            <path
                                d="M519.408 173.899C529.715 173.899 538.07 165.546 538.07 155.241C538.07 144.936 529.715 136.582 519.408 136.582C509.101 136.582 500.746 144.936 500.746 155.241C500.746 165.546 509.101 173.899 519.408 173.899Z"
                                fill="#000000" />
                            <path
                                d="M404.941 42.6715C408.221 39.3921 408.221 34.0752 404.941 30.7958C401.661 27.5164 396.343 27.5164 393.063 30.7958C389.783 34.0752 389.783 39.3921 393.063 42.6715C396.343 45.9509 401.661 45.9509 404.941 42.6715Z"
                                fill="#000000" />
                            <path
                                d="M450.459 39.6567C457.747 32.3702 457.747 20.5565 450.459 13.27C443.171 5.98349 431.355 5.9835 424.067 13.27C416.78 20.5565 416.78 32.3703 424.067 39.6568C431.355 46.9433 443.171 46.9432 450.459 39.6567Z"
                                fill="#000000" />
                            <path
                                d="M469.475 508.914C476.947 508.914 483.005 502.857 483.005 495.386C483.005 487.914 476.947 481.858 469.475 481.858C462.002 481.858 455.944 487.914 455.944 495.386C455.944 502.857 462.002 508.914 469.475 508.914Z"
                                fill="#000000" />
                            <path
                                d="M341.696 525.638C343.481 525.638 344.929 524.191 344.929 522.406C344.929 520.621 343.481 519.175 341.696 519.175C339.911 519.175 338.464 520.621 338.464 522.406C338.464 524.191 339.911 525.638 341.696 525.638Z"
                                fill="url(#paint0_linear_187_13357)" />
                        </svg>
                        <div class="testimonial-one__thumb-pen wow fadeInUp" data-wow-delay="400ms">
                            <img src="assets/images/shapes/testimonial-shape-1.png" alt="eduact" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial End -->


        @include('home.layouts.footer')
    </div>
    <!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/wingslogo-white.png"
                        width="111" height="96" alt="eduact" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:needhelp@company.com">info@wings.com.bd</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+9236809850">+(880) 187-774-0088</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <!-- <div class="mobile-nav__social">
          <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
          <a href="https://www.facebook.com/"
            ><i class="fab fa-facebook"></i
          ></a>
          <a href="https://www.pinterest.com/"
            ><i class="fab fa-pinterest-p"></i
          ></a>
          <a href="https://www.instagram.com/"
            ><i class="fab fa-instagram"></i
          ></a>
        </div> -->
            <!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" class="eduact-btn">
                    <span class="eduact-btn__curve"></span><i class="icon-Search"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <!-- back-to-top-start -->
    <a href="#" class="scroll-top">
        <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </a>
    <!-- back-to-top-end -->

    @include('home.layouts.footer_script')
</body>

</html>
