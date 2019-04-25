<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    public $table = 'kecamatan';
    public $primaryKey = 'kode_kecamatan';
	protected $fillable = ['kode_kecamatan','nama_kecamatan','keterangan','kode_kabupaten'];
}
