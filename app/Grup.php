<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    public $table = 'jenis_user';
    public $primaryKey = 'id_jenis_user';
	protected $fillable = ['id_jenis_user','nama_jenis_user','keterangan'];
}
