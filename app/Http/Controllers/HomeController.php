<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Booking;
use App\User;
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
        // dd(Auth::User());
        if (Auth::User()->admin === null) {
            return redirect()->route('booking');
        }else {
            return view('admin.dashboard');
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
                    ->join('perawatan','perawatan.id','=','booking.perawatan_id')
                    ->select('booking.*','waktu_hari.start','perawatan.nama','perawatan.harga')
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

    public function ashley_login_post(Request $request)
    {
        // dd([$request->telp,Hash::make($request->password)]);
        $user = Auth::attempt(['telp' => request('telp'), 'password' => request('password')]);
        // $user = User::where('telp',$request->telp)->where('password',bcrypt($request->password))->first();
        if ($user) {

        } else {
            return redirect()->back()->withErrors(['User Tidak Ditemukan.']);
        }

        return redirect()->route('home');
    }

    public function ashley_register_post(Request $request)
    {
        $login = User::where('telp',$request['telp'])->first();
        if ($login != null) {
            return redirect()->back()->withErrors(['Telp Sudah Terdaftar Sebelumnya.']);
        }
        $user = User::create([
                    'name' => $request['name'],
                    'telp' => $request['telp'],
                    'password' => Hash::make($request['password']),
                ]);
        Auth::attempt(['telp' => request('telp'), 'password' => request('password')]);
        return redirect()->route('home');
    }
}
