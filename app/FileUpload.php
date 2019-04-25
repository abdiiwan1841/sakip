<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'regis_lampiran';
	
	protected $primaryKey = 'id_regis_lampiran';
	
	protected $fillable = ['id_registrasi', 'nama_file', 'id', 'nama_dokumen','id_regis_lampiran'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
