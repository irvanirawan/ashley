<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HariLibur extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hari_libur';
    public $timestamps = false;
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
    protected $fillable = ['terapis_id', 'tanggal'];

    public function Terapis()
    {
        return $this->belongsTo('App\Terapi');
    }

}
