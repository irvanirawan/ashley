<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuHari extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'waktu_hari';

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
    protected $fillable = ['nama', 'start', 'finish'];

    public function Booking()
    {
        return $this->hasMany('App\Booking');
    }

}
