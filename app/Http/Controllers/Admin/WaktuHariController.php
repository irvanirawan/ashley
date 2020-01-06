<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\WaktuHari;
use Illuminate\Http\Request;

class WaktuHariController extends Controller
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
            $waktuhari = WaktuHari::where('nama', 'LIKE', "%$keyword%")
                ->orWhere('start', 'LIKE', "%$keyword%")
                ->orWhere('finish', 'LIKE', "%$keyword%")
                ->orderBy('start','asc')
                ->paginate($perPage);
        } else {
            $waktuhari = WaktuHari::orderBy('start','asc')->paginate($perPage);
        }

        return view('admin.waktu-hari.index', compact('waktuhari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.waktu-hari.create');
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
			'nama' => 'required',
			'start' => 'required|date_format:H:i|before:finish',
			'finish' => 'required|date_format:H:i|after:start'
		]);
        $requestData = $request->all();

        WaktuHari::create($requestData);

        return redirect('admin/waktu-hari')->with('flash_message', 'WaktuHari added!');
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
        $waktuhari = WaktuHari::findOrFail($id);

        return view('admin.waktu-hari.show', compact('waktuhari'));
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
        $waktuhari = WaktuHari::findOrFail($id);

        return view('admin.waktu-hari.edit', compact('waktuhari'));
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
			'nama' => 'required',
			'start' => 'required|date_format:H:i|before:finish',
			'finish' => 'required|date_format:H:i|after:start'
		]);
        $requestData = $request->all();

        $waktuhari = WaktuHari::findOrFail($id);
        $waktuhari->update($requestData);

        return redirect('admin/waktu-hari')->with('flash_message', 'WaktuHari updated!');
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
        WaktuHari::destroy($id);

        return redirect('admin/waktu-hari')->with('flash_message', 'WaktuHari deleted!');
    }
}
