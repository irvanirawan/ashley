<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerapisPerawatan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terapis_perawatan';

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
    protected $fillable = ['terapis_id', 'perawatan_id', 'keterangan'];

    public function BookingDetail()
    {
        return $this->hasMany('App\BookingDetail');
    }
    public function HariLibur()
    {
        return $this->hasMany('App\HariLibur', 'terapis_id', 'terapis_id');
    }
    public function Terapis()
    {
        return $this->belongsTo('App\Terapi', 'terapis_id');
    }
    public function Perawatan()
    {
        return $this->belongsTo('App\Perawatan', 'perawatan_id');
    }
    public function WaktuHari()
    {
        return $this->belongsToMany('App\WaktuHari','booking','terapis_perawatan_id','waktu_hari_id');
    }

}
