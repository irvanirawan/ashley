@extends('layouts.app')
@section('css')
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            {{-- <div class="col-md-9">
                <table id="table">

                </table>
            </div> --}}
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Booking
                        <span class="pull-right">
                            <a href="{{ url('/admin/booking/create') }}" class="btn btn-success btn-sm" title="Add New Booking">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">

                            </div>
                            <div class="col-sm-12">
                                {!! Form::open(['method' => 'GET', 'url' => '/admin/booking', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}

                                <div class="input-group" style="margin:10px">
                                    <div class="input-daterange" id="datepicker">
                                        <input type="date" class="form-control" name="start" value="{{(request('start') == null)?date('Y-m-d'):request('start')}}" />
                                        <span class="add-on">to</span>
                                        <input type="date" class="form-control" name="end" value="{{(request('end') == null)?date('Y-m-d'):request('end')}}" />
                                    </div>
                                </div>
                                <div class="input-group" style="margin:10px">
                                    <select name="status" class="form-control" id="status">
                                        <option value="0">Semua</option>
                                        <option value="1" {{ (request('status') == 1)?'selected':'' }}>Booking</option>
                                        <option value="2" {{ (request('status') == 2)?'selected':'' }}>Finish</option>
                                        <option value="3" {{ (request('status') == 3)?'selected':'' }}>Cancel</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Perawatan</th>
                                        <th>Terapis</th>
                                        <th>Tanggal Datang</th>
                                        <th>Slot</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($booking as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->User['name'] }}</td>
                                        <td>
                                            {{$item->Perawatan['nama']}}
                                        </td>
                                        <td>{{$item->Terapis['nama']}}</td>
                                        <td>{{$item->tanggal_datang}}</td>
                                        <td>{{$item->WaktuHari['start']}}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-primary">Booking</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge-success">Finish</span>
                                            @else
                                                <span class="badge badge-danger">Cancel</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/booking/' . $item->id) }}" title="View Booking"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if ($item->status == 1)
                                            <a href="{{ url('/booking-finish?id=' . $item->id) }}" title="Finish Booking" onclick="return confirm('Konfirmasi!')"><button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Finish</button></a>
                                            <a href="{{ url('/booking-cancel?id=' . $item->id) }}" title="Edit Booking" onclick="return confirm('Konfirmasi!')"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Cancel</button></a>
                                            @endif
                                            {{-- {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/booking-cancel?id=', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Booking',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $booking->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src ="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script>
    $('#sandbox-container .input-daterange').datepicker({
    autoclose: true
});
</script>
@endsection
