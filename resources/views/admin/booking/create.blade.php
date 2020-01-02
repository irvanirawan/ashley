@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('akame/style.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Booking</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/booking') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <div id="select-perawatan-admin">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
