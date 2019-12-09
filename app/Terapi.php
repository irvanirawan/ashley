<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terapi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terapis';

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
    protected $fillable = ['nama', 'foto', 'keterangan'];

    public function TerapisPerawatan()
    {
        return $this->hasMany('App\TerapisPerawatan');
    }
    
}
