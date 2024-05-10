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
            </div>
        </section>
        <!-- About End -->
        <!-- Counter Start -->
        <section class="fact-one" style="background-image: url(assets/images/shapes/fact-bg-1.png)">
            <div class="container">
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
                <a href="index.html" aria-label="logo image"><img src="assets/images/wingslogo-white.png" width="111"
                        height="96" alt="eduact" /></a>
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
