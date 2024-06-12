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

    public function jk(){
        return $this->belongsTo(Tbl_jk::class, 'jeniskelamin');
    }

    public function programstudi()
{
    return $this->belongsTo(Tbl_prodi::class, 'prodi');
}


}
