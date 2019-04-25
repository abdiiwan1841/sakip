<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KerangkaAcuanKegiatan extends Model
{
    //
    public $table = 'kerangka_acuan_kegiatan';
    public $primaryKey = 'id_kerangka_acuan_kegiatan';
	protected $fillable = ['id_kerangka_acuan_kegiatan',
        'kementrian_negara_lembaga',
        'program',
        'kegiatan',
        'indikator_kinerja_kegiatan',
        'jenis_keluaran',
        'volume_keluaran',
        'dasar_hukum',
        'gambaran_umum',
        'penerimaan_manfaat',
        'metode_pelaksanaan',
        'waktu_pelaksaan',
        'waktu_pencapaian_keluaran',
        'biaya_yang_diperlukan',
        'keterangan',
        'status',
        'id_waktu_pelaksanaan',
        'hasil',
        'tahap_pelaksanaan',
        'id_user'
    ];
}
