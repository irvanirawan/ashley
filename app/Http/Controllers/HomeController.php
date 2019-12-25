<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if (Auth::User()->admin == 1) {
            return redirect('admin');
        }else {
            return redirect()->route('booking');
        }
    }

    public function awal()
    {
        return view('home.home');
    }

    public function services()
    {
        return view('home.services');
    }

    public function aboutus()
    {
        return view('home.aboutus');
    }

    public function blog()
    {
        return view('home.blog');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function booking()
    {
        return view('home.booking');
    }

    public function history()
    {
        // $data = Booking::where('user_id',Auth::User()->id)->first();dd($data->TerapisPerawatan->terapis_perawatan_id);
        $data = DB::table('booking')
                    ->where('user_id',Auth::User()->id)
                    ->join('waktu_hari','waktu_hari.id','=','booking.waktu_hari_id')
                    ->join('terapis_perawatan','terapis_perawatan.id','=','booking.terapis_perawatan_id')
                    ->join('perawatan','perawatan.id','=','terapis_perawatan.perawatan_id')
                    ->get();
        return view('home.history',['data'=>$data]);
    }

    public function ashley_login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('home.login');
    }

    public function ashley_register()
    {
        return view('home.register');
    }
}
