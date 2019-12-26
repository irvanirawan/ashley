@extends('home.layouts')

@section('konten')

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Akame About Area Start -->
    <section class="akame--about--area">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12 col-lg-6">
                    <div class="section-heading text-right mb-80 pr-5 pt-3">
                        <p>Tangerang • Since 2004</p>
                        <h2>About Our Stories</h2>
                        <span>History</span>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="about--us--content mb-80">
                        <p>Lash • Brow • Nail • Facial.</p>
                        <p>🇲🇨 🇰🇷SPMU Certified.</p>
                        {{-- <img src="akame/img/core-img/signature.png" alt="">
                        <h4>Lara Croft</h4> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akame About Area End -->

    <!-- Akame Video Area Start -->
    <div class="akame--video--area">
        <div class="container">

            <!-- Video Content Area -->
            <div class="row">
                <div class="col-12">
                    <div class="video-content-area mb-80">
                        <img src="image/asley-video.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=ufuyGaaNsog" class="video-play-btn wow bounceInDown" data-wow-delay="200ms"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <span>Case</span>
                        <h2 class="counter">457</h2>
                        <p>Projects Completed</p>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-80 wow fadeInUp" data-wow-delay="400ms">
                        <span>Client</span>
                        <h2 class="counter">343</h2>
                        <p>Happy Customers</p>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-80 wow fadeInUp" data-wow-delay="600ms">
                        <span>Award</span>
                        <h2 class="counter">379</h2>
                        <p>Award Winners</p>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-80 wow fadeInUp" data-wow-delay="800ms">
                        <span>Style</span>
                        <h2 class="counter">97</h2>
                        <p>Different Therapy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akame Video Area End -->

    <!-- Testimonial Area Start -->
    <section class="testimonial-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="testimonial-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <img src="akame/img/core-img/quote.png" alt="">
                            <p>The Best Eyelash!</p>
                            <div class="ratings-name d-flex align-items-center justify-content-center">
                                <div class="ratings mr-3">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <h5>Jackson Nash</h5>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <img src="akame/img/core-img/quote.png" alt="">
                            <p>The Best Waxing!</p>
                            <div class="ratings-name d-flex align-items-center justify-content-center">
                                <div class="ratings mr-3">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <h5>Jackson Nash</h5>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <img src="akame/img/core-img/quote.png" alt="">
                            <p>The Best Facial!</p>
                            <div class="ratings-name d-flex align-items-center justify-content-center">
                                <div class="ratings mr-3">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <h5>Jackson Nash</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->

    <!-- Border -->
    <div class="container">
        <div class="border-top"></div>
    </div>

    <!-- Booking Area Start -->
    {{-- <section class="booking-area-start section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">

                <!-- Booking Info -->
                <div class="col-12 col-lg-4">
                    <div class="booking-info mb-80">
                        <h2>Booking</h2>
                        <p>Monday - Friday: 10.00 AM - 23.00 PM <br> Saturday: 10.00 AM - 19.00 PM</p>
                        <h4>(+84) 900 122 1223</h4>
                        <p>hello.colorlib@gmail.com <br> Iris Watson, P.O. Box 283 8562 Fusce Rd, NY</p>
                    </div>
                </div>

                <!-- Booking Table -->
                <div class="col-12 col-lg-8">
                    <div class="booking-table-slider owl-carousel mb-80">

                        <!-- Single Booking Table -->
                        <div class="single-booking-table d-flex">

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours active">
                                <div class="booking-day">
                                    <h5>Today</h5>
                                    <h6>Monday, 02/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span class="active">09:00</span>
                                    <span>10:00</span>
                                    <span class="active">09:15</span>
                                    <span>10:15</span>
                                    <span>09:30</span>
                                    <span>10:30</span>
                                    <span>09:45</span>
                                    <span>10:45</span>
                                </div>
                            </div>

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>Tomorrow</h5>
                                    <h6>Tueday, 03/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span>09:00</span>
                                    <span>10:00</span>
                                    <span class="active">09:15</span>
                                    <span class="active">10:15</span>
                                    <span>09:30</span>
                                    <span class="active">10:30</span>
                                    <span>09:45</span>
                                    <span>10:45</span>
                                </div>
                            </div>

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Wednesday, 04/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span>09:00</span>
                                    <span class="active">10:00</span>
                                    <span>09:15</span>
                                    <span class="active">10:15</span>
                                    <span>09:30</span>
                                    <span class="active">10:30</span>
                                    <span>09:45</span>
                                    <span class="active">10:45</span>
                                </div>
                            </div>

                        </div>

                        <!-- Single Booking Table -->
                        <div class="single-booking-table d-flex">

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Monday, 02/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span class="active">09:00</span>
                                    <span>10:00</span>
                                    <span class="active">09:15</span>
                                    <span>10:15</span>
                                    <span>09:30</span>
                                    <span>10:30</span>
                                    <span>09:45</span>
                                    <span>10:45</span>
                                </div>
                            </div>

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Tueday, 03/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span>09:00</span>
                                    <span>10:00</span>
                                    <span class="active">09:15</span>
                                    <span class="active">10:15</span>
                                    <span>09:30</span>
                                    <span class="active">10:30</span>
                                    <span>09:45</span>
                                    <span>10:45</span>
                                </div>
                            </div>

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Wednesday, 04/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span>09:00</span>
                                    <span class="active">10:00</span>
                                    <span>09:15</span>
                                    <span class="active">10:15</span>
                                    <span>09:30</span>
                                    <span class="active">10:30</span>
                                    <span>09:45</span>
                                    <span class="active">10:45</span>
                                </div>
                            </div>

                        </div>

                        <!-- Single Booking Table -->
                        <div class="single-booking-table d-flex">

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Monday, 02/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span class="active">09:00</span>
                                    <span>10:00</span>
                                    <span class="active">09:15</span>
                                    <span>10:15</span>
                                    <span>09:30</span>
                                    <span>10:30</span>
                                    <span>09:45</span>
                                    <span>10:45</span>
                                </div>
                            </div>

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Tueday, 03/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span>09:00</span>
                                    <span>10:00</span>
                                    <span class="active">09:15</span>
                                    <span class="active">10:15</span>
                                    <span>09:30</span>
                                    <span class="active">10:30</span>
                                    <span>09:45</span>
                                    <span>10:45</span>
                                </div>
                            </div>

                            <!-- Single Date & Hours -->
                            <div class="single-date-hours">
                                <div class="booking-day">
                                    <h5>After</h5>
                                    <h6>Wednesday, 04/10</h6>
                                </div>
                                <div class="booking-hours d-flex flex-wrap">
                                    <span>09:00</span>
                                    <span class="active">10:00</span>
                                    <span>09:15</span>
                                    <span class="active">10:15</span>
                                    <span>09:30</span>
                                    <span class="active">10:30</span>
                                    <span>09:45</span>
                                    <span class="active">10:45</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Booking Area End -->

    <!-- Our Expert Area Start -->
    {{-- <section class="akame-our-expert-area about-us-page section-padding-80-0">

        <!-- Side Thumbnail -->
        <div class="side-thumbnail" style="background-image: url(akame/img/bg-img/14.png);"></div>

        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Our Experts</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                    </div>
                    <!-- Our Certificate -->
                    <div class="our-certificate-area mb-60 d-flex align-items-center">
                        <img src="akame/img/core-img/certificate-1.png" alt="">
                        <img src="akame/img/core-img/certificate-2.png" alt="">
                        <img src="akame/img/core-img/certificate-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80">
                        <div class="team-member-img">
                            <img src="akame/img/bg-img/10.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Mila Hartley</h5>
                            <p>Hairdresser</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80">
                        <div class="team-member-img">
                            <img src="akame/img/bg-img/11.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Teigan Duran</h5>
                            <p>Stylist</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80">
                        <div class="team-member-img">
                            <img src="akame/img/bg-img/12.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Tanya Ramsay</h5>
                            <p>Hairstylist</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80">
                        <div class="team-member-img">
                            <img src="akame/img/bg-img/13.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Donna Carr</h5>
                            <p>Baber</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- Our Expert Area End -->

@endsection
