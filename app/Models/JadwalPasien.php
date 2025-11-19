<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPasien extends Model
{
    use HasFactory;
    // protected $primaryKey = 'nik';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $table = 'jadwal_pasien';
    protected $fillable = [
        'nik',
        'waktu_makan_1',
        'waktu_makan_2',
        'waktu_makan_3',
        'target_cairan_ml',
        'frekuensi_alarm_bb_hari',
        'waktu_alarm_bb',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
