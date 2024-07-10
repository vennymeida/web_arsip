<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriSurat;
use Carbon\Carbon;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';
    protected $fillable = [
        'id_surat',
        'nomor_surat',
        'kategori_surat',
        'judul',
        'waktu_pengarsipan',
        'file_surat',
    ];


    public function kategoriSurat()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_surat');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->waktu_pengarsipan = Carbon::now();
        });
    }
}
