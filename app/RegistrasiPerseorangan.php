<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiPerseorangan extends Model
{
    protected $table = 'registrasi_perseorangan';
	
	protected $primaryKey = 'id_registrasi_perseorangan';
	
	protected $fillable = ['nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'alamat_lengkap', 'no_hp', 'npwp',
		'email', 'id_registrasi', 'id_pengajuan_nilai_perseorangan', 'nilai_pasti_pengajuan', 'id_jenis_eksportir',
		'status_approval'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
