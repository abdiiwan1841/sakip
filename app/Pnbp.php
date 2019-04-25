<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pnbp extends Model
{
    public $table = 'rencana_kegiatan';
    public $primaryKey = 'id_perencanaan_kegiatan';
	protected $fillable = ['id_perencanaan_kegiatan','nama_perencanaan_kegiatan','keluaran','detail_kegiatan'];
}
