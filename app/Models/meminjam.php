<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meminjam extends Model
{
    use HasFactory;
    
    protected $table = 'meminjams';

    protected $fillable = [
        'aset_id',
        'pegawai_id',
        'status',
        'tanggal_pinjam',
        'tanggal_kembali',
        'batas_kembali',
        'hari_telat',
        'keterangan',
        'foto'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function scopeConfirmedAndNotReturned($query)
    {
        return $query->where('status', 'disetujui')
                    ->whereDoesntHave('mengembalikan');
    }   
}