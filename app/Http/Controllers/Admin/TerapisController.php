<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Terapi;
use App\TerapisPerawatan;
use Illuminate\Http\Request;

class TerapisController extends Controller
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
            $terapis = Terapi::where('aktif',0)->where('nama', 'LIKE', "%$keyword%")
                ->orWhere('foto', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $terapis = Terapi::where('aktif',0)->latest()->paginate($perPage);
        }

        return view('admin.terapis.index', compact('terapis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.terapis.create');
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
            'foto' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileName = time().'.'.$request->foto->extension();

        $request->foto->move(public_path('terapis'), $fileName);

        $requestData = $request->all();
        $requestData['foto'] = $fileName;

        $insert = Terapi::create($requestData);

        if ($request->perawatan != null ) {
            foreach ($request->perawatan as $value) {
                TerapisPerawatan::create(['terapis_id'=>$insert->id,'perawatan_id'=>$value]);
            }
        }

        return redirect('admin/terapis')->with('flash_message', 'Terapis added!');
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
        $terapi = Terapi::findOrFail($id);
        // $data = \App\PerawatanKategori::with(['Perawatan.TerapisPerawatan'=>function ($query) {
        //     $query->select('*')->where('terapis_id','=',2);
        // }])->get();
        // dd(json_encode($data));
        // return response()->json($data);
        return view('admin.terapis.show', compact('terapi'));
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
        $terapi = Terapi::findOrFail($id);

        return view('admin.terapis.edit', compact('terapi'));
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
            'foto' => 'mimes:jpg,jpeg,png|max:36048'
        ]);

        $requestData = $request->all();
        // $accept             = ['ProductId', 'AvailabilityTypeId','Stock','PODuration'];
        // $fieldnya           = $request->only($accept);

        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('terapis'), $fileName);
            $requestData['foto'] = $fileName;
        }

        $terapi = Terapi::findOrFail($id);
        $terapi->update($requestData);

        TerapisPerawatan::where('terapis_id','=',$id)->delete();
        foreach ($request->perawatan as $key => $value) {
            TerapisPerawatan::create(['terapis_id'=>$id,'perawatan_id'=>$value]);
        }

        return redirect('admin/terapis')->with('flash_message', 'Terapi updated!');
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
        // Terapi::destroy($id);
        Terapi::where('id',$id)->update(['aktif'=>1]);

        return redirect('admin/terapis')->with('flash_message', 'Terapi deleted!');
    }
}
