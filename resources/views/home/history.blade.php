@extends('home.layouts')

@section('head')

@endsection

@section('konten')

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Riwayat Booking</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="icon_house_alt"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{Auth::User()->name}} Booking</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Service Area Start -->
    <section class="akame-service-area">

        <!-- Single Service Item -->
        <div class="single--service--item d-flex flex-wrap align-items-center">
            <!-- Service Content -->
            <div class="service-content">
                <div class="service-text">
                    <h2>Daftar Booking</h2>
@foreach ($data as $key => $item)
                {{$key+1}}.&nbsp;<span>{{$item->nama}} ({{$item->harga}}k) &nbsp;&nbsp; : &nbsp;&nbsp; {{ date("d-m-Y",strtotime($item->tanggal_datang)) }} {{$item->start}} WIB 
                @if ($item->status == 1)
                    <a href="{{ url('/booking-cancel?id=' . $item->id) }}" title="Edit Booking" onclick="return confirm('Konfirmasi!')"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Cancel</button></a>
                @else 
                <code>canceled</code>
                @endif 
                </span><br>
@endforeach
                </div>
            </div>
            <!-- Service Thumbnail -->
            <div class="service-thumbnail bg-img jarallax" style="background-image: url({{asset('/akame')}}/img/bg-img/30.jpg);"></div>
        </div>



    </section>
    <!-- Service Area End -->

@endsection

@section('js')

@endsection
