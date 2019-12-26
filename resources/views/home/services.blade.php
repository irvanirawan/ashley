@extends('home.layouts')

@section('konten')

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Our Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
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
@foreach (DB::table('perawatan_kategori')->get() as $keysatu => $itemsatu)
    @if (($keysatu % 2) == 0)
                <div class="single--service--item d-flex flex-wrap align-items-center">
                    <!-- Service Content -->
                    <div class="service-content">
                        <div class="service-text">
                        <h2>{{$itemsatu->nama}}</h2>
                        @foreach (DB::table('perawatan')->where('perawatan_kategori_id',$itemsatu->id)->get() as $item)
                            <p><span>{{$item->nama}}:</span> <span>{{$item->harga}}</span></p>
                        @endforeach
                        </div>
                    </div>
                    <!-- Service Thumbnail -->
                    <div class="service-thumbnail bg-img jarallax" style="background-image: url({{asset('image/ashley_services/')}}/{{$keysatu}}.jpg);"></div>
                </div>
    @else
                <div class="single--service--item odd-item d-flex flex-wrap align-items-center">
                    <!-- Service Thumbnail -->
                    <div class="service-thumbnail bg-img jarallax" style="background-image: url({{asset('image/ashley_services/')}}/{{$keysatu}}.jpg);"></div>

                    <!-- Service Content -->
                    <div class="service-content">
                        <div class="service-text">
                            <h2>Hair dyed</h2>
                            @foreach (DB::table('perawatan')->where('perawatan_kategori_id',$itemsatu->id)->get() as $item)
                                <p><span>{{$item->nama}}:</span> <span>{{$item->harga}}</span></p>
                            @endforeach
                        </div>
                    </div>
                </div>
    @endif
@endforeach




    </section>
    <!-- Service Area End -->

@endsection
