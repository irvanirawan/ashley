<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking';

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
    protected $fillable = ['user_id','status','file','terapis_perawatan_id','tanggal_datang','waktu_hari_id','terapis_id','perawatan_id'];

    public function User()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function TerapisPerawatan()
    {
        return $this->belongsTo('App\TerapisPerawatan','terapis_perawatan_id');
    }
    public function Perawatan()
    {
        return $this->belongsTo('App\Perawatan','perawatan_id');
    }
    public function Terapis()
    {
        return $this->belongsTo('App\Terapi','terapis_id');
    }
    public function WaktuHari()
    {
        return $this->belongsTo('App\WaktuHari','waktu_hari_id');
    }

}
