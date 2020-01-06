<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Booking;
use App\Terapis;
use App\Perawatan;
use App\TerapisPerawatan;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;

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
        $start          = $request->has('start') ? $request->get('start') : date('Y-m-d');
        $end            = $request->has('end') ? $request->get('end') : date('Y-m-d');
        $status         = ($request->get('status'))?$request->get('status'):0;
        $where_status   = ($status != 0)?[$request->get('status')]:[1,2,3];
        $perPage = 25;
        if (!empty($keyword)) {
            $booking = Booking::whereBetween('tanggal_datang', [$start, $end])
                                ->whereIn('status', $where_status)
                                ->where(function($q) use ($keyword){
                                    $q->orWhereHas('User', function($query) use ($keyword){
                                            $query->where('name', 'LIKE', "%$keyword%");
                                        })
                                        ->orWhereHas('TerapisPerawatan.Perawatan', function($query) use ($keyword){
                                            $query->where('nama', 'LIKE', "%$keyword%");
                                        })
                                        ->orWhereHas('TerapisPerawatan.Terapis', function($query) use ($keyword){
                                            $query->where('nama', 'LIKE', "%$keyword%");
                                        });
                                })
                                ->latest()
                                ->paginate($perPage);
        } else {
            $booking = Booking::whereBetween('tanggal_datang', [$start, $end])
                                ->whereIn('status',$where_status)
                                ->latest()
                                ->paginate($perPage);
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
        return view('home.bookingadmin');
        // return view('admin.booking.create');
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
        $TerapisPerawatan = TerapisPerawatan::where('id',$request->terapis_perawatan_id)->first();
        $terapis = Terapis::where('id',$TerapisPerawatan->terapis_id)->first();
        $perawatan = Perawatan::where('id',$TerapisPerawatan->perawatan_id)->first();
        $requestData['terapis_id'] = $terapis->id;
        $requestData['perawatan_id'] = $perawatan->id;
        // $data = ['user_id'=>$request->user_id,'status'=>$request->status,'tanggal_datang'=>$request->tanggal_datang,
        //         'waktu_hari_id'=>$request->waktu_hari_id,'terapis_id'=>$request->terapis_id,'perawatan_id'=>$request->perawatan_id];
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

    public function booking(Request $request)
    {
        $user = Auth::User();
        
        $TerapisPerawatan = TerapisPerawatan::where('id',$request->terapisPerawatanId)->first();

        Booking::create([
            'user_id'               => $user->id ,
            'status'                => 1 ,
            'terapis_perawatan_id'  => $request->terapisPerawatanId ,
            'tanggal_datang'        => $request->tanggal ,
            'waktu_hari_id'         => $request->slotId ,
            'terapis_id'            => $TerapisPerawatan->terapis_id ,
            'perawatan_id'          => $TerapisPerawatan->perawatan_id
        ]);
        return response()->json('sukses');
    }

    public function booking_admin(Request $request)
    {
        if (Auth::User()->admin != 1) {
            return response()->json('hak akses dilarang.',403);
        }
        
        $TerapisPerawatan = TerapisPerawatan::where('id',$request->terapisPerawatanId)->first();

        Booking::create([
            'user_id'               => $request->user_id ,
            'status'                => 1 ,
            'terapis_perawatan_id'  => $request->terapisPerawatanId ,
            'tanggal_datang'        => $request->tanggal ,
            'waktu_hari_id'         => $request->slotId ,
            'terapis_id'            => $TerapisPerawatan->terapis_id ,
            'perawatan_id'          => $TerapisPerawatan->perawatan_id
        ]);
        return response()->json('sukses');
    }

    public function booking_finish(Request $request)
    {
        if (!$request->has('id')) {
            return redirect()->back();
        }
        $user = Auth::User();
        if ($user->admin == 1) {
            $id     = $request->id;
            $status = 2;
            Booking::where('id',$id)->update(['status'=>$status]);
        } else {
            $my_booking = Booking::where('id',$request->id)->where('user_id',$user->id)->first();
            if ($my_booking != null) {
                $id     = $request->id;
                $status = 2;
                Booking::where('id',$id)->update(['status'=>$status]);
            }else {
                return redirect('admin/booking')->with('flash_message', 'Forbiden Access!');
            }
        }

        return redirect('admin/booking')->with('flash_message', 'Booking Finish!');
    }

    public function booking_cancel(Request $request)
    {
        if (!$request->has('id')) {
            return redirect()->back();
        }
        $user = Auth::User();
        if ($user->admin == 1) {
            $id     = $request->id;
            $status = 3;
            Booking::where('id',$id)->update(['status'=>$status]);
        } else {
            $my_booking = Booking::where('id',$request->id)->where('user_id',$user->id)->first();
            if ($my_booking != null) {
                $id     = $request->id;
                $status = 3;
                Booking::where('id',$id)->update(['status'=>$status]);
            }else {
                return redirect('admin/booking')->with('flash_message', 'Forbiden Access!');
            }
        }

        return redirect('admin/booking')->with('flash_message', 'Booking Cancel!');
    }

    public function customer_data(Request $request)
    {
        $keyword    = $request->get('search');

        if (!empty($keyword)) {
            $user = User::where(function($q) use ($keyword){
                        $q->orWhere('name', 'LIKE', "%$keyword%")
                            ->orWhere('email', 'LIKE', "%$keyword%")
                            ->orWhere('telp', 'LIKE', "%$keyword%");
                        })
                        ->latest()->select(DB::raw("concat(name,(' '||telp)) as label"),'id as value')
                        ->get();
        } else {
            $user = User::where(function($q) use ($keyword){
                    $q->orWhere('name', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%")
                        ->orWhere('telp', 'LIKE', "%$keyword%");
                    })
                    ->latest()->select(DB::raw("concat(name,(' '||telp)) as label"),'id as value')
                    ->get();
        }

        return response()->json($user);
    }

    public function booking_jadwal_terapis(Request $request)
    {
        $id = ($request->has('terapis'))?$request->terapis:0;
        $data = \DB::table('booking')
                    ->leftjoin('waktu_hari','booking.waktu_hari_id','=','waktu_hari.id')
                    ->leftjoin('terapis_perawatan','booking.terapis_perawatan_id','=','terapis_perawatan.id')
                    ->join('perawatan','terapis_perawatan.perawatan_id','=','perawatan.id')
                    ->where('terapis_perawatan.perawatan_id',$id)
                    ->select('perawatan.nama as title',\DB::raw("concat(booking.tanggal_datang,(' '||waktu_hari.start)) as start"))
                    ->get();
        return response()->json($data);
    }

    public function dataterapis(Request $request)
    {
        $data = \App\Terapi::select('nama as label','id as value')->get();
        return response()->json($data);
    }
}
