  <header class="main-header">
      <nav class="main-menu">
          <div class="container">
              <div class="main-menu__logo">
                  <!-- <a href="index.html">
                <img
                  src="assets/images/wingslogo.png"
                  width="111"
                  height="96"
                  alt="Eduact"
                />
              </a> -->
                  <!-- <a href="index.html">
                <div id="logo-image" class="logo-dark"></div>
              </a> -->
                  <a href="{{ route('home') }}">
                      <img id="logo-image" src="{{ asset('assets/images/wingslogo.png') }}" width="111"
                          height="96" alt="WINGS" />
                  </a>
              </div>
              <!-- /.main-menu__logo -->
              <div class="main-menu__nav">
                  <ul class="main-menu__list">
                      <li class="dropdown">
                          <!-- <a href="index.html">About <br /> WINGS</a> -->
                          <a href="#">About WINGS</a>
                          <ul>
                              <li><a href="{{ route('about') }}">About Us</a></li>
                              <li><a href="#">Services & Facilities</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <a href="#">Courses</a>
                          <ul>
                              <li><a href="#">English Language Courses</a></li>
                              <li><a href="#">IELTS Preparation Courses</a></li>
                              <li>
                                  <a href="#">O Level Preparation Courses</a>
                              </li>
                              <li><a href="#">Chinese Language Courses</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <!-- <a href="#" style="text-align: center;">Exam <br /> Services</a> -->
                          <a href="#" style="text-align: center">Exams</a>
                          <ul>
                              <li>
                                  <a href="#">IELTS Exams</a>
                                  <ul class="sub-menu">
                                      <li><a href="#">IELTS Test Dates</a></li>
                                      <li><a href="#">IELTS Mock Test Dates</a></li>
                                      <li><a href="#">IELTS Test Results</a></li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="#">O Level Exams</a>
                                  <ul class="sub-menu">
                                      <li><a href="#">O Level Venue Mock</a></li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="#">Chinese Language Exams</a>
                                  <ul class="sub-menu">
                                      <li><a href="#">HSK Exam</a></li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="#">Other Professional Exams</a>
                                  <ul class="sub-menu">
                                      <li><a href="#">MRCP Exam</a></li>
                                      <li><a href="#">Derby University Exam</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <!-- <a href="#">Skills <br /> Development</a> -->
                          <a href="#">Training</a>
                          <ul>
                              <li><a href="#">Why WINGS Learning Centre</a></li>
                              <li><a href="#">Management Training</a></li>
                              <li>
                                  <a href="#">Interpersonal Skills Development</a>
                              </li>
                              <li><a href="#">Sales/Branding Training</a></li>
                              <li>
                                  <a href="#">Personal Skills Development Training</a>
                              </li>
                              <li><a href="#">Human Resource Training</a></li>
                              <li><a href="#">Our Valued Clients</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <!-- <a href="#">Event🇸 & <br /> Activities</a> -->
                          <a href="#">Events</a>
                          <ul>
                              <li><a href="#">Exclusives</a></li>
                              <li><a href="#">Super Mocks</a></li>
                          </ul>
                      </li>

                      <li><a href="#">Contact</a></li>

                  </ul>
              </div>

              <!-- /.main-menu__nav -->
              <div class="main-menu__right">
                  <a href="#" class="main-menu__toggler mobile-nav__toggler">
                      <i class="fa fa-bars"></i> </a><!-- /.mobile menu btn -->
                  <a href="#" class="main-menu__search search-toggler">
                      <i class="icon-Search"></i> </a><!-- /.search btn -->

                  @if (Auth::guard('student')->check())
                      <div class="main-menu__nav">
                          <ul class="main-menu__list">
                              <li class="dropdown">
                                  <a href="#" class="main-menu__login" id="studentDropdown" role="button"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="icon-account-1"></i>{{ Auth::guard('student')->user()->StudentName }}
                                  </a>
                                  <ul>
                                      <li><a href="{{ route('studentDashboard') }}">Dashboard</a></li>
                                      <li><a href="{{ route('student.logout') }}">Logout</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                  @else
                      <a href="{{ route('student.login') }}" class="main-menu__login">
                          <i class="icon-account-1"></i>
                      </a>
                  @endif

                  <!-- /.login btn -->
                  <a href="#" class="eduact-btn"><span class="eduact-btn__curve"></span>Get In
                      Touch</a><!-- /.contact btn -->
                  <!-- <div class="toggle-btn eduact-btn">
                <span>Dark</span>
                <img src="assets/images/moon.png" alt="" />
              </div> -->
                  <!-- <label for="">
                <input type="checkbox" name="" id="" class="dark-mode" />
                <ion-icon name="moon" class="moon"></ion-icon>
                <span class="toggle"></span>
              </label> -->
                  <div class="nav__btns">
                      <!-- Theme change button -->
                      {{-- <i class="uil uil-moon change-theme" id="theme-button"></i> --}}
                  </div>
              </div>
              <!-- /.main-menu__right -->
          </div>
          <!-- /.container -->
      </nav>
      <!-- /.main-menu -->
  </header>
  <!-- /.main-header -->

  <div class="stricky-header stricked-menu main-menu">
      <div class="sticky-header__content"></div>
      <!-- /.sticky-header__content -->
  </div>
  <!-- /.stricky-header -->
