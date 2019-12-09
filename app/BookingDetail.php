<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking_detail';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['booking_id', 'terapis_perawatan_id', 'tanggal_datang', 'waktu_hari_id'];

    public function Booking()
    {
        return $this->belongsTo('App\Booking');
    }
    public function TerapisPerawatan()
    {
        return $this->belongsTo('App\TerapisPerawatan');
    }
    public function WaktuHari()
    {
        return $this->belongsTo('App\WaktuHari');
    }

}
