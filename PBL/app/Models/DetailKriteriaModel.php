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
        'status_kps',
        'status_kajur',
        'status_kjm',
        'status_direktur',
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

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function penetapan(){
        return $this->hasOne(PenetapanModel::class, 'id_penetapan', 'id_penetapan');
    }

    public function pelaksanaan(){
        return $this->hasOne(PelaksanaanModel::class, 'id_pelaksanaan', 'id_pelaksanaan');
    }

    public function evaluasi(){
        return $this->hasOne(EvaluasiModel::class, 'id_evaluasi', 'id_evaluasi');
    }

    public function pengendalian(){
        return $this->hasOne(PengendalianModel::class, 'id_pengendalian', 'id_pengendalian');
    }

    public function peningkatan(){
        return $this->hasOne(PeningkatanModel::class, 'id_peningkatan', 'id_peningkatan');
    }

    public function komentar(){
        return $this->hasOne(KomentarModel::class, 'id_komentar', 'id_komentar');
    }
}