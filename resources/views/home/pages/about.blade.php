<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About WINGS</title>
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
                <h2 class="page-header__title">About</h2>
                <!-- /.page-title -->
                <ul class="page-header__breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>About</span></li>
                </ul>
                <!-- /.page-breadcrumb list-unstyled -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.page-header -->
        <!-- About Start -->
        <section class="about-two about-two--about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__thumb wow fadeInLeft" data-wow-delay="100ms">
                            <!-- about thumb start -->
                            <div class="about-two__thumb__one eduact-tilt"
                                data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                                <img src="assets/images/resources/about-2-2-about_2.jpg" alt="eduact" />
                            </div>
                            <!-- /.about-thumb-one -->
                            <div class="about-two__thumb__two">
                                <img src="assets/images/resources/about-2-1-about_2.jpg" alt="eduact" />
                                <div class="about-two__thumb__two-icon">
                                    <span class="icon-business"></span>
                                </div>
                            </div>
                            <!-- /.about-thumb-two -->
                            <div class="about-two__fact">
                                <div class="about-two__fact__icon">
                                    <span class="icon-trophy"></span>
                                </div>
                                <div class="about-two__fact__content">
                                    <div class="about-two__fact__count">
                                        +<span class="count-box">
                                            <span class="count-text" data-stop="230" data-speed="1500"></span>
                                        </span>
                                    </div>
                                    <!-- /.fact-one__count -->
                                    <h3 class="about-two__fact__title">Awesome Awards</h3>
                                    <!-- /.fact-one__title -->
                                </div>
                            </div>
                            <!-- /.fact-item -->
                            <div class="about-two__thumb__shape1 wow zoomIn" data-wow-delay="300ms">
                                <img src="assets/images/shapes/about-2-shape-1.png" alt="eduact" />
                            </div>
                            <!-- /.about-shape-one -->
                            <div class="about-two__thumb__shape2 wow zoomIn" data-wow-delay="400ms">
                                <img src="assets/images/shapes/banner-map.png" alt="eduact" />
                            </div>
                            <!-- /.about-shape-two -->
                            <div class="about-two__thumb__shape3 wow zoomIn" data-wow-delay="400ms">
                                <img src="assets/images/shapes/about-2-shape-3.png" alt="eduact" />
                            </div>
                            <!-- /.about-shape-two -->
                            <div class="about-two__thumb__shape4 wow zoomIn" data-wow-delay="400ms">
                                <img src="assets/images/shapes/about-2-shape-4.png" alt="eduact" />
                            </div>
                            <!-- /.about-shape-two -->
                        </div>
                        <!-- about thumb end -->
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="100ms">
                        <div class="about-two__content">
                            <!-- about content start-->
                            <div class="section-title">
                                <h5 class="section-title__tagline">
                                    About Us
                                    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                                        <g clip-path="url(#clip0_324_36194)">
                                            <path
                                                d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                                            <path
                                                d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                                            <path
                                                d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                                            <path
                                                d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                                        </g>
                                    </svg>
                                </h5>
                                <!-- <h2 class="section-title__title">
                    Establishing a Community that Encourages Lifelong Learning
                  </h2> -->
                            </div>
                            <!-- section-title -->
                            <!-- <p class="about-two__content__text">
                  It uses a dictionary of over 200 Latin words, combined with a
                  handful of model sentence structures, to generate Lorem Ipsum
                  which looks The generated Lorem Ipsum is therefore always free
                  from repetition
                </p> -->
                            <div class="about-two__about-box">
                                <div class="about-two__about-box__top">
                                    <div class="about-two__about-box__icon">
                                        <span class="icon-logical-thinking"></span>
                                    </div>
                                    <h4 class="about-two__about-box__title">Mission</h4>
                                </div>
                                <p class="about-two__about-box__text justify-content-center">
                                    To be the premier educational institution in providing
                                    high-quality, affordable and accessible
                                    educationalprogrammes serving the needs of business,
                                    industry and the diverse campus communities and facilitating
                                    thepersonal and professional development of its students,
                                    faculty and staff. To offer opportunities to
                                    students/Learners from across the globe by encouraging them
                                    to reach their potentialsthrough communicative and flexible
                                    teaching and learning strategies. Also, to contribute a fair
                                    share in socialdevelopment by offering opportunities of
                                    employment as well as career development to our students.
                                    Satisfying thediverse needs and expectations of all members
                                    of this institute and community by creating an environment
                                    oftolerance, care, professionalism and regulatory
                                    compliance.
                                </p>
                            </div>
                            <!-- /.icon-box -->
                            <div class="about-two__about-box">
                                <div class="about-two__about-box__top">
                                    <div class="about-two__about-box__icon">
                                        <span class="icon-vision"></span>
                                    </div>
                                    <h4 class="about-two__about-box__title">Vision</h4>
                                </div>
                                <p class="about-two__about-box__text justify-content-center">
                                    WINGS'vision is to become the 'provider of choice' of
                                    learning and development solutions in the market it serves.
                                    Itdesigns and delivers high quality, original learning and
                                    development solutions that meet client's
                                    organizationalneeds. It is devoted to inspiring people to
                                    realize their full potential through a wealth of learning
                                    solutions that isengaging, innovative and challenging.
                                </p>
                                <p class="about-two__about-box__text justify-content-center">
                                    To be a student-centered, dynamic and innovative, unique
                                    class campus of WLC-Wings learning
                                    Center,promotingexcellence in teaching and learning, serving
                                    diverse communities and producing lifelong learners who can
                                    competeglobally.
                                </p>
                            </div>
                            <!-- /.icon-box -->
                        </div>
                        <!-- about content end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->
        <!-- Counter Start -->
        <section class="fact-one" style="background-image: url(assets/images/shapes/fact-bg-1.png)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="fact-one__item text-center">
                            <svg viewBox="0 0 303 181" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.00049" width="300" height="177" rx="7" stroke="#4F5DE4"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-dasharray="20 20" />
                            </svg>
                            <div class="fact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="54000" data-speed="1500"></span> </span>+
                            </div>
                            <!-- /.fact-one__count -->
                            <h3 class="fact-one__title">IELTS registration at WLC</h3>
                            <!-- /.fact-one__title -->
                        </div>
                        <!-- /.fact-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="fact-one__item text-center">
                            <svg viewBox="0 0 303 181" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.00049" width="300" height="177" rx="7"
                                    stroke="#4F5DE4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-dasharray="20 20" />
                            </svg>
                            <div class="fact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="25884" data-speed="1500"></span> </span>+
                            </div>
                            <!-- /.fact-one__count -->
                            <h3 class="fact-one__title">Registered alumni at WLC</h3>
                            <!-- /.fact-one__title -->
                        </div>
                        <!-- /.fact-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="fact-one__item text-center">
                            <svg viewBox="0 0 303 181" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.00049" width="300" height="177" rx="7"
                                    stroke="#4F5DE4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-dasharray="20 20" />
                            </svg>
                            <div class="fact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="21700" data-speed="1500"></span> </span>+
                            </div>
                            <!-- /.fact-one__count -->
                            <h3 class="fact-one__title">WINGS certified so far</h3>
                            <!-- /.fact-one__title -->
                        </div>
                        <!-- /.fact-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="fact-one__item text-center">
                            <svg viewBox="0 0 303 181" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.00049" width="300" height="177" rx="7"
                                    stroke="#4F5DE4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-dasharray="20 20" />
                            </svg>
                            <div class="fact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="1575" data-speed="1500"></span> </span>+
                            </div>
                            <!-- /.fact-one__count -->
                            <h3 class="fact-one__title">IELTS mock test at WLC</h3>
                            <!-- /.fact-one__title -->
                        </div>
                        <!-- /.fact-item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter End -->
        <!-- Course Start -->

        <!-- Course End -->
        <!-- Testimonial Start -->
        <!-- Testimonial End -->

        <!-- Team Start -->
        <!-- Team End -->

        <!-- Call To Action Start -->
        <!-- Call To Action End -->

        <!-- Testimonial Start -->
        {{-- <section class="testimonial-one">
        <div class="container">
          <div class="paragraph-text section-title text-center">
            <h2 class="section-title__title title-normal">
              Glorious journey of two decades
            </h2>
            <span class="justify-content-center paragraph-text"
              >Founded in 2001, WINGS is one of Bangladesh's much reputed
              English and other language traininginstitutions, AHC & CO. Ltd.
              (AHCCL)'s learning Unit and official test centre (BD001) being in
              PlatinumAssociation with British Council Bangladesh to host the
              International English Language Testing System(IELTS) and other
              Academic and Professionals examinations. Besides all type of
              customized languageprograms, AHCCL is well known for exclusive
              training program of all types ranging from academic tocorporate,
              soft skill to high tech ICT skills.
            </span>
          </div>
          <!-- section-title -->
          <div class="normal-image justify-center">
            <!-- Testimonial Item -->
            <div class="mt-4 flex w-full items-center justify-center">
              <span
                ><span
                  ><img
                    style="
                      max-width: 100%;
                      width: initial;
                      height: initial;
                      background: none;
                      opacity: 1;
                      border: 0;
                      border-radius: 10px;
                      margin: 0;
                      padding: 0;
                      margin-top: 30px;
                    "
                    alt=""
                    aria-hidden="true"
                    src="assets/images/wings/glorious-journey.jpg" /></span
              ></span>
            </div>
          </div>
        </div>
      </section> --}}
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
