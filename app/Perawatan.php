<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perawatan';

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
    protected $fillable = ['nama', 'perawatan_kategori_id', 'harga', 'keterangan'];

    public function Perawatankategori()
    {
        return $this->belongsTo('App\PerawatanKategori','perawatan_kategori_id');
    }
    public function TerapisPerawatan()
    {
        return $this->hasMany('App\TerapisPerawatan','perawatan_id');
    }

}
