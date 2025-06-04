<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomentarModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel
    protected $table = 't_komentar';

    // Mendefinisikan primary key
    protected $primaryKey = 'id_komentar';

    // Menentukan bahwa primary key adalah auto-incrementing
    public $incrementing = true;
    public $timestamps = false; // Tidak menggunakan timestamps

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'komentar',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
