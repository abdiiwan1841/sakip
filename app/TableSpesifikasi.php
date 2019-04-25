<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableSpesifikasi extends Model
{
    //
    public $table = 'table_spesifikasi';
    public $primaryKey = 'id_table';
	protected $fillable = ['id_table',
        'uraian_pekerjaan',
        'spesifikasi',
        'status',
        'keterangan',
        'id_table_spesifikasi'
    ];
}
