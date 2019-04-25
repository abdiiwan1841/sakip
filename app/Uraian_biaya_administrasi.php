<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian_biaya_administrasi extends Model
{
    public $table = 'uraian_biaya_administrasi';
    public $primaryKey = 'id_uraian_biaya_administrasi';
    protected $fillable = ['id_uraian_biaya_administrasi',
        'Unit_organisasi_satker',
        'Penyusunan_biaya_administrasi',
        'alokasi_dana',
        'Kegiatan',
        'waktu_pelaksanaan',
        'jenis_pengadaan',
        'satuan_ukur',
        'status',
        'keterangan',
        'kebutuhan_biaya_pengadaan',
        'pagu_anggaran',
        'biaya_administrasi',
        'biaya_fisik',
        'id_uraian_lengkap'];
    public $timestamps = false;
}
