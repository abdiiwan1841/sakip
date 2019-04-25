<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hakakses extends Model
{
    public $table = 'p_hakakses';
    public $primaryKey = 'id_hakakses';
	protected $fillable = ['id_hakakses','id_jenis_user','id_menu','create_at','updated_at'];
}
