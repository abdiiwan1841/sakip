<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepoUserdetail extends Model
{
     //

    protected $table = 'repo_userdetail';
	protected $primaryKey = 'id_repo_userdetail';


	 protected $fillable = [
        'id_repo_userdetail', 'nama_lengkap_perseorangan', 'alamat_lengkap_perseorangan','no_hp_perseorangan','no_telp_perseorangan','nik_perseorangan','tempat_lahir_perseorangan','tanggal_lahir_perseorangan','npwp_perseorangan','email_perseorangan','kode_provinsi_perseorangan','kode_provinsi_perseorangan','provinsi_perseorangan','kode_kabupaten_perseorangan','kabupaten_perseorangan','kode_kecamatan_perseorangan','kecamatan_perseorangan','kode_kelurahan_perseorangan','kelurahan_perseorangan','kode_pos_perseorangan','status_pernikahan','nama_ibu_kandung','nama_pasangan','tempat_lahir_pasangan','tanggal_lahir_pasangan','nomor_ktp_pasangan','no_hp','alamat_pasangan','nama_perusahaan','tahun_berdiri_perusahaan','bidang_usaha_perusahaan','omset_perusahaan_setahun','jumlah_karyawan','siup','tdp','alamat_lengkap_perusahaan','kode_provinsi_perusahaan','provinsi_perusahaan','kode_kabupaten_perusahaan','kabupaten_perusahaan','kode_kecamatan_perusahaan','kecamatan_perusahaan','kode_kelurahan_perusahaan','kelurahan_perusahaan','no_telp_perusahaan','no_fax_perusahaan','npwp_perusahaan','email_perusahaan','kode_pos_perusahaan','id'
    ];
}
