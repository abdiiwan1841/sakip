<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    public $table = 'master_akun';
    public $primaryKey = 'id_akun';
     public $timestamps = false;
	protected $fillable = ['id_akun','nama_akun','keterangan','updated_at'];
}
