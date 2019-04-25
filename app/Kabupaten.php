<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    //
    public $table = 'kabupaten';
    public $primaryKey = 'kode_kabupaten';
	protected $fillable = ['kode_kabupaten','nama_kabupaten','keterangan','kode_provinsi'];
}
