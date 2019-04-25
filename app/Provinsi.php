<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    public $table = 'provinsi';
    public $primaryKey = 'kode_provinsi';
	protected $fillable = ['kode_provinsi','nama_provinsi','keterangan'];
}
