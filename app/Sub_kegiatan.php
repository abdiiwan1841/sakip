<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_kegiatan extends Model
{
    public $table = 'sub_kegiatan';
    public $primaryKey = 'id_sub_kegiatan';
	protected $fillable = ['id_sub_kegiatan','nama_sub_kegiatan','keterangan'];
}
