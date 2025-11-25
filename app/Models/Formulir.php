<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $fillable = [
        'pegawai_id',
        'jenis_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'alamat',
        'total_hari',
        'status',
        'keterangan',
        'pdf_path',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
