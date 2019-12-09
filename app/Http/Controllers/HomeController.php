<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
