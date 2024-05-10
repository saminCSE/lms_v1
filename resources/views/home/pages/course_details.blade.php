<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Course Details</title>
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
        @include('home.layouts.navbar_1')
        <!-- course-details-start -->
        <section class="course-details mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="course-details__thumb">
                            <img src="{{ asset('storage/img/' . $course->course_image_1) }}" alt="eduact" />
                        </div>
                        <!-- details-thumb -->
                        <div class="course-details__meta">
                            <div class="course-details__meta__cats">
                                <a href="course.html">Development</a>
                            </div>
                            <div class="course-details__meta__ratings">
                                <span class="icon-star"></span><span class="icon-star"></span><span
                                    class="icon-star"></span><span class="icon-star"></span><span
                                    class="icon-star"></span>
                                <div class="course-details__meta__ratings__reviews">
                                    (25 Reviews)
                                </div>
                            </div>
                            <div class="course-details__meta__price">৳ {{ $course->course_price }}</div>
                        </div>
                        <!-- details-meta -->
                        <h3 class="course-details__title">
                            {{ $course->name }}
                        </h3>
                        <!-- details-title -->
                        <div class="course-details__tabs tabs-box">
                            <ul class="course-details__tabs__lists tab-buttons list-unstyled">
                                <li data-tab="#overview" class="tab-btn">
                                    <span>Overview</span>
                                </li>
                                <li data-tab="#curriculum" class="tab-btn active-btn">
                                    <span>Curriculum</span>
                                </li>
                                <li data-tab="#reviews" class="tab-btn">
                                    <span>Reviews</span>
                                </li>
                                <li data-tab="#instructor" class="tab-btn">
                                    <span>Instructor</span>
                                </li>
                            </ul>
                            <!-- tab-title -->
                            <div class="tabs-content">
                                <div class="tab fadeInUp animated" id="overview">
                                    <div class="course-details__overview">
                                        <p class="course-details__overview__text">
                                            {{ $course->course_description }}
                                        </p>
                                    </div>
                                </div>
                                <!-- tab-content-overview -->

                                <div class="tab active-tab fadeInUp animated" id="curriculum">
                                    <div class="courses__curriculum-wrap">
                                        <h3 class="title">Course Curriculum</h3>
                                        <p>{{ $course->course_description }}</p>

                                        <div class="accordion" id="accordionExample">
                                            @foreach ($course->sections as $section)
                                                @if (is_object($section))
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $section->id }}">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $section->id }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse{{ $section->id }}">
                                                                {{ $section->section_title }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $section->id }}"
                                                            class="accordion-collapse collapse show"
                                                            aria-labelledby="heading{{ $section->id }}"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <ul class="list-wrap">
                                                                    @foreach ($section->lectures as $lecture)
                                                                        @php
                                                                            // Check if the user is authenticated
                                                                            $user = Auth::guard('student')->user();
                                                                            $userId = $user ? $user->id : null;

                                                                            // Query the enrollments table directly
                                                                            $enrollment = DB::table('enrollments')
                                                                                ->where('studentId', $userId)
                                                                                ->where('courseId', $course->id)
                                                                                ->where('status', 'Complete')
                                                                                ->first();
                                                                        @endphp
                                                                        <li class="course-item">
                                                                            @if ($enrollment && $userId)
                                                                                <a href="{{ $lecture->url }}"
                                                                                    target="blank"
                                                                                    class="course-item-link">
                                                                                    <span
                                                                                        class="item-name">{{ $lecture->lecture_title }}</span>
                                                                                    <br />
                                                                                    <div class="course-item-meta">
                                                                                        {{--  <span class="item-meta duration">{{ $lecture->content }}</span> --}}
                                                                                    </div>
                                                                                </a>
                                                                            @else
                                                                                <span
                                                                                    class="item-name">{{ $lecture->lecture_title }}</span>
                                                                                <div class="course-item-meta">
                                                                                    <span
                                                                                        class="item-meta duration">{{ $lecture->duration }}</span>

                                                                                    <span
                                                                                        class="item-meta course-item-status">
                                                                                        <img src="{{ asset('assets/assets_2/img/icons/lock.svg') }}"
                                                                                            alt="icon" />
                                                                                    </span>

                                                                                </div>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                <!-- tab-content-curriculum -->
                                <div class="tab fadeInUp animated" id="reviews">
                                    <div class="course-details__comment">
                                        <h3 class="course-details__review-title">2 Reviews</h3>
                                        <!--Start Comment Box-->
                                        <div class="course-details__comment-box">
                                            <figure class="course-details__comment-box__thumb">
                                                <img src="assets/images/resources/review-2-1.jpg" alt="eduact" />
                                            </figure>
                                            <!-- comment-image -->
                                            <h4 class="course-details__comment-box__meta">
                                                David Shon
                                            </h4>
                                            <!-- comment-meta -->
                                            <div class="course-details__comment-box__ratings">
                                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                    class="fa fa-star"></span>
                                            </div>
                                            <!-- comment-ratings -->
                                            <p class="course-details__comment-box__text">
                                                Nam vel lacus eu nisl bibendum accumsan vitae vitae
                                                nibh. Nam nec eros id magna hendrerit sagittis. Nullam
                                                sed mi non odio feugiat volutpat sit amet nec elit.
                                                Maecenas id hendrerit ipsum. Sed eget auctor metus, ac
                                                dapibus dolor.
                                            </p>
                                            <!-- comment-text -->
                                        </div>
                                        <!--End Comment Box-->
                                        <!--Start Comment Box-->
                                        <div class="course-details__comment-box">
                                            <figure class="course-details__comment-box__thumb">
                                                <img src="assets/images/resources/review-2-2.jpg" alt="eduact" />
                                            </figure>
                                            <!-- comment-image -->
                                            <h4 class="course-details__comment-box__meta">
                                                Sarah Albert
                                            </h4>
                                            <!-- comment-meta -->
                                            <div class="course-details__comment-box__ratings">
                                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                    class="fa fa-star"></span>
                                            </div>
                                            <!-- comment-ratings -->
                                            <p class="course-details__comment-box__text">
                                                Nam vel lacus eu nisl bibendum accumsan vitae vitae
                                                nibh. Nam nec eros id magna hendrerit sagittis. Nullam
                                                sed mi non odio feugiat volutpat sit amet nec elit.
                                                Maecenas id hendrerit ipsum. Sed eget auctor metus, ac
                                                dapibus dolor.
                                            </p>
                                            <!-- comment-text -->
                                        </div>
                                        <!--End Comment Box-->
                                    </div>
                                    <!-- /.review-comment -->
                                    <div class="course-details__form">
                                        <h3 class="course-details__form-title">Add a Review</h3>
                                        <div class="course-details__form-ratings">
                                            <p class="course-details__form-ratings__label">
                                                Rate this Product
                                            </p>
                                            <span class="far fa-star"></span><span class="far fa-star"></span><span
                                                class="far fa-star"></span><span class="far fa-star"></span><span
                                                class="far fa-star"></span>
                                        </div>
                                        <!-- review-ratings -->
                                        <form action="assets/inc/sendemail.php"
                                            class="review-form contact-form-validated" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="review-form__input-box">
                                                        <input type="text" placeholder="Your Name"
                                                            name="name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="review-form__input-box">
                                                        <input type="email" placeholder="Email Address"
                                                            name="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="review-form__input-box">
                                                        <textarea name="message" placeholder="Write a Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="eduact-btn eduact-btn-second">
                                                        <span class="eduact-btn__curve"></span>Leave a
                                                        Review<i class="icon-arrow"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="result"></div>
                                    </div>
                                    <!-- /.review-form -->
                                </div>
                                <!-- tab-content-reviews -->
                                <div class="tab fadeInUp animated" id="instructor">
                                    <div class="course-details__instructor">
                                        <figure class="course-details__instructor__thumb">
                                            <img src="assets/images/resources/instructor-1.jpg" alt="eduact" />
                                        </figure>
                                        <!-- instructor-image -->
                                        <h4 class="course-details__instructor__name">
                                            Guy Hawkins
                                        </h4>
                                        <!-- instructor-name -->
                                        <span class="course-details__instructor__designation">Project
                                            Manager</span><!-- instructor-designation -->
                                        <p class="course-details__instructor__text">
                                            Nam vel lacus eu nisl bibendum accumsan vitae vitae
                                            nibh. Nam nec eros id magna hendrerit sagittis. Nullam
                                            sed mi non odio feugiat volutpat sit amet nec elit.
                                            Maecenas id hendrerit ipsum. Sed eget auctor metus, ac
                                            dapibus dolor.
                                        </p>
                                        <!-- instructor-text -->
                                    </div>
                                </div>
                                <!-- tab-content-instructor -->
                            </div>
                            <!-- tab-content -->
                        </div>
                        <!-- tabs -->
                    </div>
                    <div class="col-xl-4 wow fadeInRight" data-wow-delay="300ms">
                        <div class="course-details__sidebar">
                            <div class="course-details__sidebar__item">
                                <h3 class="course-details__sidebar__title">
                                    Course Features
                                </h3>
                                <ul class="course-details__sidebar__lists clerfix">
                                    <li>
                                        <i class="icon-history"></i>Duration:<span>{{ $course->course_duration }}
                                            Hours</span>
                                    </li>
                                    {{-- <li><i class="icon-book"></i>Lessons:<span>15</span></li> --}}
                                    <li>
                                        <i class="icon-reading"></i>Students:<span>Max
                                            {{ $course->availableseat }}</span>
                                    </li>
                                    <li>
                                        <i class="icon-play-border"></i>Videos<span>10 Hours</span>
                                    </li>
                                    <li>
                                        <i class="icon-logical-thinking"></i>Skill Level<span>Advanced</span>
                                    </li>
                                    <li>
                                        <i class="icon-Digital-marketing"></i>Language:<span>English</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('checkout_easy', ['course_id' => $course->id]) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="courseName" value="{{ $course->name }}">
                                        <input type="hidden" name="batchName" value="{{ $course->batchName }}">
                                        <input type="hidden" name="coursePrice"
                                            value="{{ $course->course_price }}">
                                        <button type="submit" class="eduact-btn eduact-btn-second"><span
                                                class="eduact-btn__curve"></span>Buy This Course<i
                                                class="icon-arrow"></i></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- course-details-end -->

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
    <!-- Include jQuery -->
</body>

</html>
