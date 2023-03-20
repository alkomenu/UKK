<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = [
            'id_pengaduan',
            'tgl_pengaduan',
            'nik',
            'isi_laporan',
            'foto',
            'status'
    ];
    use HasFactory;
}
