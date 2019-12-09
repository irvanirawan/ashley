<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerawatanKategori extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perawatan_kategori';

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
    protected $fillable = ['nama', 'keterangan'];

    public function Perawatan()
    {
        return $this->hasMany('App\Perawatan','perawatan_kategori_id');
    }

}
