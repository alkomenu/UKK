<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'masyarakat';
    protected $fillable = [
            'nik',
            'nama',
            'username',
            'password',
            'telp',
    ];

}
