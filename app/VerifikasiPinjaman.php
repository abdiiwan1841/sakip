<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiPinjaman extends Model
{
   	protected $table = 'verifikasi_pinjaman';
	protected $primaryKey = 'id_verifikasi';

	protected $fillable = ['id_verifikasi','id_registrasi','verifikator','status','create_at','create_by','keterangan'];

	public $updated_at = false;
	public $created_at = false;
}
