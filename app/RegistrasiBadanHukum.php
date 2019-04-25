<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiBadanHukum extends Model
{
    protected $table = 'registrasi_badan_hukum';
	
	protected $primaryKey = 'id_registrasi_badan_hukum';
	
	protected $fillable = ['id_registrasi', 'nama_perusahaan', 'tahun_berdiri', 'bidang_usaha', 'omset_perusahaan_setahun',
		'jumlah_karyawan', 'siup', 'tdp', 'alamat_lengkap_perusahaan', 'nomor_telp', 'nomor_fax', 'npwp_perusahaan',
		'email_perusahaan', 'nama_pemohon', 'nik_pemohon', 'tempat_lahir_pemohon', 'tanggal_lahir_pemohon',
		'alamat_lengkap_pemohon', 'nomor_hp_pemohon', 'email_pemohon', 'jabatan_pemohon', 'id_pengajuan_nilai_badan_hukum',
		'nilai_pasti_pengajuan', 'id_jenis_eksportir', 'status_approval'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
