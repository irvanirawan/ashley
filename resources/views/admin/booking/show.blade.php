@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Booking {{ $booking->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/booking') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if ($booking->status == 1)
                        <a href="{{ url('/booking-finish?id=' . $booking->id) }}" title="Finish Booking" onclick="return confirm('Konfirmasi!')"><button class="btn btn-success btn-sm"><i class="fas pencil" aria-hidden="true"></i> Finish</button></a>
                        <a href="{{ url('/booking-cancel?id=' . $booking->id) }}" title="Edit Booking" onclick="return confirm('Konfirmasi!')"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Cancel</button></a>
                        {{-- <a href="{{ url('/admin/booking/' . $booking->id . '/edit') }}" title="Edit Booking"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                        {{-- {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/booking', $booking->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Booking',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!} --}}
                        @endif
                        <br/>
                        <br/>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Terapis</th>
                                                <td>{{ $booking->Terapis['nama'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Keterangan</th>
                                                <td>{{ $booking->Terapis['keterangan'] }}</td>
                                            </tr>
                                            <tr>
                                                <th><img style="width: 150px" src="{{ asset('terapis').'/'.$booking->TerapisPerawatan->Terapis['foto'] }}" ></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Customer Name</th>
                                                <td>{{ $booking->User['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Customer Phone</th>
                                                <td>{{ $booking->User['telp'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Booking</th>
                                                <td>{{ $booking->TerapisPerawatan->Perawatan['nama'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Booking Date/Slot</th>
                                                <td>{{ $booking->tanggal_datang }} &nbsp; {{ $booking->WaktuHari['start'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
