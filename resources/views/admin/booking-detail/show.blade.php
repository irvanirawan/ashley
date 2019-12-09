@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">BookingDetail {{ $bookingdetail->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/booking-detail') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/booking-detail/' . $bookingdetail->id . '/edit') }}" title="Edit BookingDetail"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/bookingdetail', $bookingdetail->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete BookingDetail',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $bookingdetail->id }}</td>
                                    </tr>
                                    <tr><th> Booking Id </th><td> {{ $bookingdetail->booking_id }} </td></tr><tr><th> Terapis Perawatan Id </th><td> {{ $bookingdetail->terapis_perawatan_id }} </td></tr><tr><th> Tanggal Datang </th><td> {{ $bookingdetail->tanggal_datang }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
