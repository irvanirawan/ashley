<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword        = $request->get('search');
        $tanggal_datang = $request->has('date') ? $request->get('date') : date('Y-m-d');
        $perPage = 25;
        // $booking = Booking::whereHas('BookingDetail',function ($q) use($tanggal_datang){
        //                         $q->where('tanggal_datang','=',$tanggal_datang);
        //                     });
        // $booking = Booking::where('status',1);
        if (!empty($keyword)) {
            $booking = Booking::where('status',1)->with(['TerapisPerawatan'])->latest()->paginate($perPage);
        } else {
            $booking = Booking::where('status',1)->with(['TerapisPerawatan'])->latest()->paginate($perPage);
        }

        return view('admin.booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'user_id' => 'required|min:1'
		]);
        $requestData = $request->all();

        Booking::create($requestData);

        return redirect('admin/booking')->with('flash_message', 'Booking added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'user_id' => 'required|min:1'
		]);
        $requestData = $request->all();

        $booking = Booking::findOrFail($id);
        $booking->update($requestData);

        return redirect('admin/booking')->with('flash_message', 'Booking updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return redirect('admin/booking')->with('flash_message', 'Booking deleted!');
    }
}
