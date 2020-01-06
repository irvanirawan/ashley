<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Perawatan;
use Illuminate\Http\Request;

class PerawatanController extends Controller
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
    public function api_index(Request $request)
    {
        $data = \App\PerawatanKategori::with(['Perawatan'])->where('aktif',0)->get();
        return response()->json($data);
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
            $perawatan = Perawatan::where('aktif','=',0)
                ->where('nama', 'LIKE', "%$keyword%")
                ->orWhere('perawatan_kategori_id', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->with('Perawatankategori')
                ->latest()->paginate($perPage);
        } else {
            $perawatan = Perawatan::where('aktif','=',0)->with('Perawatankategori')->latest()->paginate($perPage);
        }

        return view('admin.perawatan.index', compact('perawatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.perawatan.create');
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
			'perawatan_kategori_id' => 'required|min:1',
			'nama' => 'required'
		]);
        $requestData = $request->all();

        Perawatan::create($requestData);

        return redirect('admin/perawatan')->with('flash_message', 'Perawatan added!');
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
        $perawatan = Perawatan::findOrFail($id);

        return view('admin.perawatan.show', compact('perawatan'));
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
        $perawatan = Perawatan::findOrFail($id);

        return view('admin.perawatan.edit', compact('perawatan'));
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
			'perawatan_kategori_id' => 'required|min:1',
			'nama' => 'required'
		]);
        $requestData = $request->all();

        $perawatan = Perawatan::findOrFail($id);
        $perawatan->update($requestData);

        return redirect('admin/perawatan')->with('flash_message', 'Perawatan updated!');
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
        // Perawatan::destroy($id);
        Perawatan::where('id',$id)->update(['aktif'=>1]);
        return redirect('admin/perawatan')->with('flash_message', 'Perawatan deleted!');
    }
}
