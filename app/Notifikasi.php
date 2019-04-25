<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    public $table = 'notifikasi';
    public $primaryKey = 'id_notifikasi';
	protected $fillable = ['id_notifikasi','id_registrasi','for','read','created_date','updated_date','notif']; 
}
