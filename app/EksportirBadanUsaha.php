<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksportirBadanUsaha extends Model
{
    protected $table = 'eksportir_badan_usaha';
	
	protected $primaryKey = 'id_eksportir_badan_usaha';
	
	protected $fillable = ['id_registrasi_badan_hukum', 'komoditi', 'negara_tujuan', 'dokumen_kontrak', 'modal_kerja',
		'promosi', 'investasi', 'lainnya'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
