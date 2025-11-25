<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nip',
        'name',
        'jabatan',
        'unit_kerja',
        'tanggal_masuk',
        'no_telp'
    ];

    public function cuti()
    {
        return $this->hasOne(Cuti::class);
    }

    public function formulirs()
    {
        return $this->hasMany(Formulir::class);
    }
}