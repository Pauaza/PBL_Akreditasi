<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel
    protected $table = 't_kriteria';

    // Mendefinisikan primary key
    protected $primaryKey = 'id_kriteria';

    // Menentukan bahwa primary key adalah auto-incrementing
    public $incrementing = true;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'nama_kriteria',
    ];

       public function details()
    {
        return $this->hasMany(DetailKriteriaModel::class, 'id_kriteria', 'id_kriteria');
    }
}
