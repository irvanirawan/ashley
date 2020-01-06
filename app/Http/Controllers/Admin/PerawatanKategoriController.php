<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PerawatanKategori;
use Illuminate\Http\Request;

class PerawatanKategoriController extends Controller
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
            $perawatankategori = PerawatanKategori::where('aktif',0)->where('nama', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $perawatankategori = PerawatanKategori::where('aktif',0)->latest()->paginate($perPage);
        }

        return view('admin.perawatan-kategori.index', compact('perawatankategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.perawatan-kategori.create');
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
			'nama' => 'required'
		]);
        $requestData = $request->all();

        PerawatanKategori::create($requestData);

        return redirect('admin/perawatan-kategori')->with('flash_message', 'PerawatanKategori added!');
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
        $perawatankategori = PerawatanKategori::findOrFail($id);

        return view('admin.perawatan-kategori.show', compact('perawatankategori'));
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
        $perawatankategori = PerawatanKategori::findOrFail($id);

        return view('admin.perawatan-kategori.edit', compact('perawatankategori'));
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
			'nama' => 'required'
		]);
        $requestData = $request->all();

        $perawatankategori = PerawatanKategori::findOrFail($id);
        $perawatankategori->update($requestData);

        return redirect('admin/perawatan-kategori')->with('flash_message', 'PerawatanKategori updated!');
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
        // PerawatanKategori::destroy($id);
        PerawatanKategori::where('id',$id)->update(['aktif'=>1]);
        return redirect('admin/perawatan-kategori')->with('flash_message', 'PerawatanKategori deleted!');
    }
}
