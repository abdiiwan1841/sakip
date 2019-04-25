<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaganOrganisasi extends Model
{
    //
    public $table = 'bagan_organisasi';
    public $primaryKey = 'id_bagan_organisasi';
	protected $fillable = ['id_bagan_organisasi',
        'upload_bagan_organisasi',
        'keterangan',
        'status',
        'id_user'
    ];
}
