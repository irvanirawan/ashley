@extends('home.layouts')

@section('head')
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
</style>
@endsection

@section('konten')
    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Form Booking</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Booking</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->
    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
<!-- Akame About Area Start -->
<section id="select-perawatan" class="bg-form akame-portfolio section-padding-80 clearfix" style="z-index:1">

</section>
<!-- Modal -->
{{-- <div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <h1>TESssss</h1>
      </div>

    </div>
  </div> --}}
<!-- Akame About Area End <div id="select-tanggal"></div> -->
@endsection

@section('js')
<script>
document.getElementById("two").focus();
</script>
@endsection
