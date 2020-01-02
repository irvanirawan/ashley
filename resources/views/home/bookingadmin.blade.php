<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Ashley Beauty Lounge</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    {{-- <link rel="icon" href="{{asset('akame/img/core-img/favicon.ico')}}"> --}}
    <link rel="icon" href="{{asset('image/ashleyfav.png')}}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    {{-- <link href="css/modal.css" rel="stylesheet"> --}}
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('akame/style.css')}}">
    <script>
        //
        window.myToken =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
    /*search box css start here*/
    .single-booking-table .single-date-hours {
        flex: 100%!important;
        max-width: 100%!important;
    }
    .perawatanli{
        margin-left: 10px;
        margin-top: 10px;
    }
    .perawatanlis{
        margin-left: 15px;
    }
    .perawatanlis:hover {
        background-color: #ccc;
        cursor: pointer;
    }
    .jamslot:hover {
        background-color: #ccc;
        cursor: pointer;
    }
    .search-sec{
        padding: 2rem;
    }
    .search-slt{
        display: block;
        width: 100%;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #55595c;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    .wrn-btn{
        width: 100%;
        font-size: 16px;
        font-weight: 400;
        text-transform: capitalize;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    @media (min-width: 992px){
        .search-sec{
            position: relative;
            /* top: -114px; */
            background: rgba(26, 70, 104, 0.51);
        }
    }
    @media screen and (min-width: 768px){
        .pull80{
            padding-left:80px;
        }
    }
    @media screen and (max-width: 450px){
        .pull80{
            padding-bottom:10px;
        }
        .mb-80{
            margin-bottom: 10px;
        }
    }
    @media (max-width: 992px){
        .search-sec{
            background: #1A4668;
        }
        .section-padding-80{
            padding:0px;
        }
        .foot{
            height: 200px;
        }

    }
    .instant-results {
        background:#fff;
        width: 100%;
        color:gray;
        position: sticky;
        /* top: 100%; */
        /* left: 0px; */
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 4px;
        -webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, .175);
        box-shadow: 0 2px 4px rgba(0, 0, 0, .175);
        display: none;
        z-index: 9;
        top: 43px;
        max-height: 300px;
        overflow-y: scroll;
    }
    .bg-form{
        background-image: url('{{asset("image/nails.jpg")}}');
        /* background-repeat: no-repeat; */
    }

    /* The Modal (background) */
    .modal {
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    .modal-backdrop {
        z-index: 00;
    }
    .footer-area {
        z-index: 00;
    }
    .header-area {
        z-index: 000;
    }
    .breadcrumb-content {
        z-index: -1;
    }
    .modal-90w {
        width: 90%;
        max-width: none!important;
    }
    .click {
        opacity: 0.4;
        -webkit-box-shadow: 0 2px 40px 8px rgba(15, 15, 15, 0.15);
        box-shadow: 0 2px 40px 8px rgba(15, 15, 15);
    }
    .click .team-social-info {
        opacity: 1;
        visibility:visible;
    }
    .css-10nd86i{
        height: 100%;
    }
    .css-1aya2g8{
        height: 100%;
    }
    .social-link{
        position: absolute;
    }
    </style>
<style>

</style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="/admin/booking"><img style="width: 90px" src="{{asset('image/back-button.webp')}}" alt=""></a>
                        <h2>Form Booking</h2>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    <section id="select-perawatan-admin" class="bg-form akame-portfolio section-padding-80 clearfix" style="z-index:1"></section>
    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="foot col-12 col-sm-6 col-md-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img style="width: 200px;" src="{{asset('image/ashley1.jpg')}}" alt=""></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!-- All JS Files -->
    <!-- jQuery -->
    <script src="{{asset('akame/js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{asset('akame/js/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('akame/js/bootstrap.min.js')}}"></script>
    <!-- All Plugins -->
    <script src="{{asset('akame/js/akame.bundle.js')}}"></script>
    <!-- Active -->
    <script src="{{asset('akame/js/default-assets/active.js')}}"></script>

    {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}

</body>

</html>
