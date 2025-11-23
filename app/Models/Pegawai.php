<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'telp',
        'jk',
        'username',
        'password',
        'user_id',
        'jabatan_id',
        'unitkerja_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function unitkerja()
    {
        return $this->belongsTo(Unitkerja::class);
    }

}
