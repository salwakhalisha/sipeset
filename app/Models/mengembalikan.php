<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengembalikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'meminjam_id',
        'tanggal',
        'kondisi',
        'keterangan',
    ];

        public function mengembalikan()
        {
            return $this->hasOne(Mengembalikan::class);
        }

        public function aset()
        {
            return $this->belongsTo(Aset::class, 'aset_id');
        }

        public function meminjam()
        {
            return $this->belongsTo(Meminjam::class);
        }

}
