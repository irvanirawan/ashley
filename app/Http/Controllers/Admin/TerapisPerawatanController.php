<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\TerapisPerawatan;
use Illuminate\Http\Request;

class TerapisPerawatanController extends Controller
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
            $terapisperawatan = TerapisPerawatan::where('terapis_id', 'LIKE', "%$keyword%")
                ->orWhere('perawatan_id', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $terapisperawatan = TerapisPerawatan::latest()->paginate($perPage);
        }

        return view('admin.terapis-perawatan.index', compact('terapisperawatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.terapis-perawatan.create');
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
			'terapis_id' => 'required|min:1',
			'perawatan_id' => 'required|min:1'
		]);
        $requestData = $request->all();

        TerapisPerawatan::create($requestData);

        return redirect('admin/terapis-perawatan')->with('flash_message', 'TerapisPerawatan added!');
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
        $terapisperawatan = TerapisPerawatan::findOrFail($id);

        return view('admin.terapis-perawatan.show', compact('terapisperawatan'));
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
        $terapisperawatan = TerapisPerawatan::findOrFail($id);

        return view('admin.terapis-perawatan.edit', compact('terapisperawatan'));
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
			'terapis_id' => 'required|min:1',
			'perawatan_id' => 'required|min:1'
		]);
        $requestData = $request->all();

        $terapisperawatan = TerapisPerawatan::findOrFail($id);
        $terapisperawatan->update($requestData);

        return redirect('admin/terapis-perawatan')->with('flash_message', 'TerapisPerawatan updated!');
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
        TerapisPerawatan::destroy($id);

        return redirect('admin/terapis-perawatan')->with('flash_message', 'TerapisPerawatan deleted!');
    }
}
