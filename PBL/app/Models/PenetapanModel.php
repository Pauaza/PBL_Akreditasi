<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenetapanModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel
    protected $table = 't_penetapan';

    // Mendefinisikan primary key
    protected $primaryKey = 'id_penetapan';

    // Menentukan bahwa primary key adalah auto-incrementing
    public $incrementing = true;
    public $timestamps = false; // Tidak menggunakan timestamps

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'penetapan',
        'pendukung',
        'link',
        'id_kriteria',
    ];

    // Relasi ke KriteriaModel
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(KriteriaModel::class, 'id_kriteria', 'id_kriteria');
    }

    public function getPendukungUrlAttribute()
    {
        return $this->pendukung 
            ? asset('storage/' . $this->pendukung)
            : null;
    }
}
