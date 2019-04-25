<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RincianAnggaranBiaya extends Model
{
    //
    public $table = 'rincian_anggaran_biaya';
    public $primaryKey = 'id_rincian';
	protected $fillable = ['id_rincian',
        'uraian_pekerjaan',
        'jumlah',
        'satuan',
        'harga_satuan',
        'harga_jasa',
        'harga_material',
        'harga_jumlah',
        'keterangan',
        'status',
        'id_rincian_anggaran_biaya'
    ];
}
