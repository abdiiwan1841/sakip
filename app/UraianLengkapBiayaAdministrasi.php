<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UraianLengkapBiayaAdministrasi extends Model
{
    //
    public $table = 'uraian_lengkap_biaya_administrasi';
    public $primaryKey = 'id_uraian';
	protected $fillable = ['id_uraian',
        'uraian_pekerjaan',
        'jumlah_satuan',
        'harga_satuan',
        'satuan',
        'jumlah',
        'status',
        'keterangan',
        'id_uraian_lengkap',
        'jumlah satuan'
    ];
}
