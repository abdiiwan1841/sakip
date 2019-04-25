<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian_kegiatan_rincian_biaya extends Model
{
    public $table = 'uraian_kegiatan_rincian_biaya';
    public $primaryKey = 'id_uraian_kegiatan_rincian_biaya';
    protected $fillable = ['id_uraian_kegiatan_rincian_biaya',
        'kementrian_negara_lembaga',
        'unit_organisasi_satker',
        'kegiatan',
        'keluaran',
        'detil_kegiatan',
        'volume',
        'satuan_ukur',
        'alokasi_dana',
        'keterangan',
        'status',
        'total_biaya_administrasi',
        'total_biaya_fisik',
        'Total_keseluruhan',
        'id_rincian_anggaran_biaya'];
    public $timestamps = false;
}
