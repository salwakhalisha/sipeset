<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'status',
        'kondisi',
        'lokasi',
        'kategori_id',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
