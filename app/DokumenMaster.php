<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenMaster extends Model
{
    protected $table = 'master_lampiran';
	
	protected $primaryKey = 'id_lampiran';
	
	protected $fillable = ['nama_lampiran'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
