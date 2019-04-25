<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksportir extends Model
{
    //
     //
    protected $table = 'eksportir';
	
	protected $primaryKey = 'id_eksportir';
	
	protected $fillable = ['id_eksportir', 'komoditi_ekspor', 'negara_tujuan', 'dokumen_kontrak', 'jenis_modal',
		'promosi', 'nilai_jenis_modal', 'lainnya','id_registrasi'];
	
	public $updated_at = false;
	public $created_at = false;
}
