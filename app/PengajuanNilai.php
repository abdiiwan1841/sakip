<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanNilai extends Model
{
    //
      //
    public $table = 'pengajuan_nilai';
    public $primaryKey = 'id_pengajuan_nilai';
	protected $fillable = ['id_pengajuan_nilai','nilai_min','status','nilai_max','keterangan'];
}
