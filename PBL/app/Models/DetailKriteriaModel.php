<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKriteriaModel extends Model
{
    protected $table = 'm_detail_kriteria';
    protected $primaryKey = 'id_detail_kriteria';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_penetapan',
        'id_pelaksanaan',
        'id_evaluasi',
        'id_pengendalian',
        'id_peningkatan',
        'id_kriteria',
        'id_komentar',
        'status_validator',
        'status_selesai'
    ];

    // Enum status untuk kemudahan coding
    public const STATUS_SAVE = 'save';
    public const STATUS_SUBMIT = 'submit';

    // Fungsi helper untuk cek status
    public function isSaved()
    {
        return $this->status_selesai === self::STATUS_SAVE;
    }

    public function isSubmitted()
    {
        return $this->status_selesai === self::STATUS_SUBMIT;
        
    }

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'id_kriteria');
    }
}