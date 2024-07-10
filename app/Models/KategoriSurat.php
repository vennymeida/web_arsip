<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;
    protected $table = 'kategori_surats';
    protected $fillable = [
        'id_kategorisurat',
        'nama_kategori',
        'keterangan',
    ];

    public function surats()
    {
        return $this->hasMany(Surat::class, 'kategori_surat');
    }
}
