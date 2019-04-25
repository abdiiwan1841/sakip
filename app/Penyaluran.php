<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    public $table = 'master_penyaluran_anggaran';
    public $primaryKey = 'id_master_penyaluran_anggaran';
	protected $fillable = ['id_master_penyaluran_anggaran','penyaluran_anggaran','keterangan'];
}
