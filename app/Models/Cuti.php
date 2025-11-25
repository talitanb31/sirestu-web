<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $fillable = [
        'pegawai_id',
        'cuti_n',
        'cuti_1n',
        'cuti_2n',
        'cuti_besar',
        'cuti_sakit',
        'cuti_melahirkan',
        'cuti_alasan_penting',
        'cuti_diluat_negara'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
