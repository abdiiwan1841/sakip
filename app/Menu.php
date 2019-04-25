<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $table = 'p_menu';
    public $primaryKey = 'id_menu';
	protected $fillable = ['id_menu','nama_menu','url','urutan','create_at'];
}
