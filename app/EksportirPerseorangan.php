<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksportirPerseorangan extends Model
{
    protected $table = 'eksportir_perseorangan';
	
	protected $primaryKey = 'id_eksportir_perseorangan';
	
	protected $fillable = ['id_registrasi_perseorangan', 'komoditi', 'negara_tujuan', 'dokumen_kontrak', 'modal_kerja',
		'promosi', 'investasi', 'lainnya'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
