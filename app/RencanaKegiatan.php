<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaKegiatan extends Model
{
    //
    public $table = 'rencana_kegiatan';
    public $primaryKey = 'id_perencanaan_kegiatan';
	protected $fillable = ['id_perencanaan_kegiatan',
        'nama_perencanaan_kegiatan',
        'keluaran',
        'detail_kegiatan',
        'alokasi_anggaran',
        'alokasi_anggaran_fisik',
        'alokasi_anggaran_biaya_administrasi',
        'catatan',
        'keterangan',
        'status',
        'id_master_penyaluran_anggaran',
        'id_sumber_alokasi_dana',
        'id_surat_pengantar_kalakgiat',
        'id_kerangka_acuan_kegiatan',
        'id_uraian_kegiatan_rincian_biaya',
        'id_syarat_teknis',
        'id_gambar_denah',
        'id_bagan_organisasi',
        'id_surat_pernyataan_mutlak',
        'id_rencana_kegiatan',
        'id_rencana_program_rengiat',
        'id_uraian_biaya_administrasi',
        'id_kegiatan_perencanaan',
        'id_sub_kegiatan',
        'id_sub_kategori_akun',
        'tanggal_rencana',
        'id_user',
    ];
}
