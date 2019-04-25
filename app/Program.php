<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public $table = 'master_program';
    public $primaryKey = 'id_program';
	protected $fillable = ['id_program','nama_program','keterangan'];
}
