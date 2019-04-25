<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiPelakuUsaha extends Model
{
    protected $table = 'registrasi_pelaku_usaha';
	protected $primaryKey = 'id_registrasi';

	protected $fillable = ['id_registrasi','tanggal_registrasi','status','keterangan','id_jenis_registrasi','nama_jenis_registrasi','id','id_pengajuan_nilai','nilai_pengajuan_pasti','id_jenis_eksportir'];

	public $updated_at = false;
	public $created_at = false;
	
}
