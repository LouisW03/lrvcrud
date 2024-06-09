<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_mhs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim', 'nama_mhs', 'jeniskelamin', 'alamat', 'prodi', 'foto', 'email'
    ];
}
