<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HariLibur;
use Illuminate\Http\Request;

class HariLiburController extends Controller
{
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
            $harilibur = HariLibur::where('terapis_id', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $harilibur = HariLibur::latest()->paginate($perPage);
        }

        return view('admin.hari-libur.index', compact('harilibur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.hari-libur.create');
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

        $requestData = $request->all();
        // dd($requestData);
        HariLibur::create($requestData);

        return redirect('admin/hari-libur')->with('flash_message', 'HariLibur added!');
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
        $harilibur = HariLibur::findOrFail($id);

        return view('admin.hari-libur.show', compact('harilibur'));
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
        $harilibur = HariLibur::findOrFail($id);

        return view('admin.hari-libur.edit', compact('harilibur'));
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

        $requestData = $request->all();

        $harilibur = HariLibur::findOrFail($id);
        $harilibur->update($requestData);

        return redirect('admin/hari-libur')->with('flash_message', 'HariLibur updated!');
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
        HariLibur::destroy($id);

        return redirect('admin/hari-libur')->with('flash_message', 'HariLibur deleted!');
    }
}
