<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BookingDetail;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bookingdetail = BookingDetail::where('booking_id', 'LIKE', "%$keyword%")
                ->orWhere('terapis_perawatan_id', 'LIKE', "%$keyword%")
                ->orWhere('tanggal_datang', 'LIKE', "%$keyword%")
                ->orWhere('waktu_hari_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bookingdetail = BookingDetail::latest()->paginate($perPage);
        }

        return view('admin.booking-detail.index', compact('bookingdetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.booking-detail.create');
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
			'booking_id' => 'required|min:1',
			'terapis_perawatan_id' => 'required|min:1',
			'tanggal_datang' => 'required|date',
			'waktu_hari_id' => 'required|min:1'
		]);
        $requestData = $request->all();

        BookingDetail::create($requestData);

        return redirect('admin/booking-detail')->with('flash_message', 'BookingDetail added!');
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
        $bookingdetail = BookingDetail::findOrFail($id);

        return view('admin.booking-detail.show', compact('bookingdetail'));
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
        $bookingdetail = BookingDetail::findOrFail($id);

        return view('admin.booking-detail.edit', compact('bookingdetail'));
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
			'booking_id' => 'required|min:1',
			'terapis_perawatan_id' => 'required|min:1',
			'tanggal_datang' => 'required|date',
			'waktu_hari_id' => 'required|min:1'
		]);
        $requestData = $request->all();

        $bookingdetail = BookingDetail::findOrFail($id);
        $bookingdetail->update($requestData);

        return redirect('admin/booking-detail')->with('flash_message', 'BookingDetail updated!');
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
        BookingDetail::destroy($id);

        return redirect('admin/booking-detail')->with('flash_message', 'BookingDetail deleted!');
    }
}
