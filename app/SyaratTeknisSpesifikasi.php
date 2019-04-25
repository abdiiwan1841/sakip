<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SyaratTeknisSpesifikasi extends Model
{
    //
    public $table = 'syarat_teknis_spesifikasi';
    public $primaryKey = 'id_syarat_teknis';
	protected $fillable = ['id_syarat_teknis',
        'kementrian_negara',
        'unit_organisasi_satker',
        'kegiatan',
        'keluaran',
        'datil_kegiatan',
        'volume',
        'satuan_ukur',
        'alokasi_dana',
        'status',
        'keterangan',
        'id_table_spesifikasi',
        'id_user'
    ];
}
