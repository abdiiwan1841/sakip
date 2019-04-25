<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterRengiat extends Model
{
    public $table = 'master_rencana_program_rengiat';
    public $primaryKey = 'id_rencana_program_rengiat';
	protected $fillable = ['id_rencana_program_rengiat','rencana_program_rengiat','status','keterangan'];
    public $timestamps = false;
}
