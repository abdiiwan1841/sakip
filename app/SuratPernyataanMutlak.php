<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratPernyataanMutlak extends Model
{
    //
    public $table = 'surat_pernyataan_mutlak';
    public $primaryKey = 'id_surat_pernyataan_mutlak';
	protected $fillable = ['id_surat_pernyataan_mutlak',
        'yang_bertanggung_jawab',
        'Jabatan',
        'upload_surat_pernyataan',
        'status',
        'keterangan',
        'id_user'
    ];
}
