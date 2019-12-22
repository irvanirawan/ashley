<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perawatan;
use App\PerawatanKategori;
use App\WaktuHari;
use App\TerapisPerawatan;

class ApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function perawatan(Request $request)
    {
        $data = PerawatanKategori::with(['Perawatan'])->get();
        return response()->json($data);
    }

    public function tanggal(Request $request)
    {
        $data = WaktuHari::all();
        return response()->json($data);
    }

    public function terapis(Request $request)
    {
        $data = TerapisPerawatan::has('Terapis')->has('Perawatan')->with(['Terapis','Perawatan'])->get();
        return response()->json($data);
    }
}
