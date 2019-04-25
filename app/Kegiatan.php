<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    public $table = 'master_kegiatan';
    public $primaryKey = 'id_kegiatan';
	protected $fillable = ['id_kegiatan','nama_kegiatan','keterangan_kegiatan'];
}
