<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables;
use DB;
use Illuminate\Support\Facades\Hash;

class DataTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = \App\PerawatanKategori::all();
        $data = DB::table('booking')
                    ->join('users','users.id','=','booking.user_id')
                    ->join('waktu_hari','waktu_hari.id','=','booking.waktu_hari_id')
                    ->join('terapis_perawatan','terapis_perawatan.id','=','booking.terapis_perawatan_id')
                    ->join('perawatan','perawatan.id','=','terapis_perawatan.perawatan_id')
                    ->get();
        return datatables()->of($data)->toJson();
    }

    public function generateterapis()
    {
        $terapis = DB::table('terapis')->get();
        foreach ($terapis as $key => $value) {
            $data = DB::table('users')->where('telp',$value->id)->first();
            if ($data === null) {
                DB::table('users')->insert([
                    'name'      =>  $value->nama,
                    'password'  =>  Hash::make(123456),
                    'admin'     =>  3,
                    'telp'      =>  $value->id
                ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
