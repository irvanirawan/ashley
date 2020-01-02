<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perawatan;
use App\PerawatanKategori;
use App\WaktuHari;
use App\TerapisPerawatan;
use App\Booking;
use Auth;

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
        $tgl = $request->tanggal;
        $data = WaktuHari::withCount([
            'TerapisPerawatan'=>function ($q) use($tgl){ $q->where('booking.tanggal_datang','=',$tgl);}
            ])->orderBy('start')->get();
        $terapisPerawatan = TerapisPerawatan::where('perawatan_id','=',$request->perawatanId)->count();
        return response()->json(['count'=>$terapisPerawatan,'data'=>$data]);
    }

    public function terapis(Request $request)
    {
        $tgl = $request->tanggal;
        $slotId = $request->slotId;
        $perawatanId = $request->perawatanId;
        $data = TerapisPerawatan::where('perawatan_id','=',$perawatanId)
                                ->withCount([
                                    'WaktuHari'=>function ($q) use($tgl,$slotId){ $q->where('booking.tanggal_datang','=',$tgl)->where('waktu_hari.id','=',$slotId);},
                                    'HariLibur'=>function ($q) use($tgl){$q->where('tanggal',$tgl);}])
                                ->has('Terapis')
                                ->has('Perawatan')
                                ->with(['Terapis','Perawatan'])
                                ->get();
        return response()->json($data);
    }

    public function booking(Request $request)
    {
        $tes = Auth::User();
        // Booking::create([
        //     'user_id'               => 1 ,
        //     'status'                => 1 ,
        //     'terapis_perawatan_id'  => 1 ,
        //     'tanggal_datang'        => 1 ,
        //     'waktu_hari_id'         => 1
        // ]);
        return response()->json($tes);
    }
}
