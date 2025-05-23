<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeningkatanModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel
    protected $table = 't_peningkatan';

    // Mendefinisikan primary key
    protected $primaryKey = 'id_peningkatan';

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

    // Relasi ke DetailKriteriaModel
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(DetailKriteriaModel::class, 'id_kriteria', 'id_kriteria');
    }

    public function getPendukungUrlAttribute()
    {
        return $this->pendukung 
            ? asset('storage/' . $this->pendukung)
            : null;
    }
}
