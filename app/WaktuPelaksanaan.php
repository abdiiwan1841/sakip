<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuPelaksanaan extends Model
{
    //
    public $table = 'waktu_pelaksanaan';
    public $primaryKey = 'id_waktu';
	protected $fillable = ['id_waktu',
        'uraian_kegiatan',
        'jadwal_waktu',
        'status',
        'keterangan',
        'id_waktu_pelaksanaan'
    ];
}
