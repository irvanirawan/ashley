@extends('home.layouts')

@section('konten')

    <!-- Google Maps Start -->
    <div class="akame-google-maps-area">
        <iframe src="https://maps.google.com/maps?q=ashley%20beauty%20lounge%20tangerang&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
    </div>
    <!-- Google Maps End -->

    <!-- Contact Information Area Start -->
    <section class="contact-information-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_phone"></i>
                        <h4>Phone</h4>
                        <p>0816-1922-942</p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_pin"></i>
                        <h4>Address</h4>
                        <p>Ruko Azores Blok 7C/12, Banjar Wijaya, Jl. Wijaya Kusuma, RT.001/RW.003, Poris Plawad Indah, Cipondoh, Tangerang City, Banten 15142</p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_clock"></i>
                        <h4>Open time</h4>
                        <p>08:00 am to 20:00 pm</p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_mail"></i>
                        <h4>Email</h4>
                        <p>ashleyindo@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Information Area End -->

    <!-- Contact Area Start -->
    <section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Leave message</h2>
                        <p>Our staff will call back later and answer your questions.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <form action="#" method="post" class="akame-contact-form border-0 p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="message-name" class="form-control mb-30" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control mb-30" placeholder="Start the discussion..."></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn akame-btn btn-3 mt-15 active">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->

@endsection
