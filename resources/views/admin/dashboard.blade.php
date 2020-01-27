@extends('layouts.app')
@section('style')
<style>
.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card-counter primary">
                                        <i class="fa fa-ticket"></i>
                                        <span class="count-numbers"><a style="color:#FFF" href="">{{DB::table('booking')->where('status',1)->count()}}</a></span>
                                        <span class="count-name">Booking</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card-counter danger">
                                        <i class="fa fa-code-fork"></i>
                                        <span class="count-numbers"><a style="color:#FFF" href="">{{DB::table('booking')->where('status',2)->count()}}</a></span>
                                        <span class="count-name">Cancel Booking</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card-counter success">
                                        <i class="fa fa-database"></i>
                                        <span class="count-numbers"><a style="color:#FFF" href="">{{DB::table('booking')->where('status',3)->count()}}</a></span>
                                        <span class="count-name">Booked</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card-counter info">
                                        <i class="fa fa-users"></i>
                                        <span class="count-numbers"><a style="color:#FFF" href="">{{DB::table('users')->count()}}</a></span>
                                        <span class="count-name">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <br>
                <div class="card" style="padding-top:0px">
                    <div class="card-header">Data Customer</div>

                    <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Telp</th>
                                                    <th>Booking Finish</th>
                                                    <th>Booking Cancel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(DB::table('users')->where('admin','=',null)->get() as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->telp }}</td>
                                                    <td>{{ 0 }}</td>
                                                    <td>{{ 0 }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div class="pagination-wrapper"> {!! $perawatankategori->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
