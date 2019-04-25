<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAkun extends Model
{
    
    protected $table = 'user_account';
	protected $primaryKey = 'id_user_account';


	 protected $fillable = [
        'username', 'nama_lengkap', 'password_real','password_encryp','tanggal_account','alamat_email','id_user_detail',
    ];
}
