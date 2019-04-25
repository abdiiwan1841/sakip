<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepoLampiran extends Model
{
    //

    protected $table = 'repo_lampiran';
	
	protected $primaryKey = 'id_repo_lampiran';
	
	protected $fillable = ['id_registrasi', 'nama_file', 'id', 'nama_dokumen','id_repo_lampiran'];
	
	public $updated_at = false;
	public $created_at = false;
		
	public function getUpdatedAtColumn() {
		return null;
	}
}
