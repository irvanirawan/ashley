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
    protected $fillable = ['user_id','status','file','terapis_perawatan_id','tanggal_datang','waktu_hari_id'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function TerapisPerawatan()
    {
        return $this->hasOne('App\TerapisPerawatan','terapis_perawatan_id');
    }
    public function Perawatan()
    {
        return $this->hasOne('App\Perawatan','App\TerapisPerawatan','terapis_perawatan_id','perawatan_id','id','id');
    }
    public function Terapis()
    {
        return $this->hasOne('App\Terapi','App\TerapisPerawatan','terapis_perawatan_id','terapis_id','id','id');
    }

}
