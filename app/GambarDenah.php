<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarDenah extends Model
{
    //
    public $table = 'gambar_denah';
    public $primaryKey = 'id_gambar_denah';
	protected $fillable = ['id_gambar_denah',
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
        'id_user'
    ];
}
