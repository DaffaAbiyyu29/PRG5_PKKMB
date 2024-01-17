<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class DetailJam extends Model
{
    protected $table = 'pkm_trdetailjamplusminus';
    protected $primaryKey = 'dtj_idjam';
    public $timestamps = false;

    protected $fillable = [
        'dtj_idjam',
        'dtj_nopendaftaran',
        'dtj_jenisjam',
        'dtj_jumlah',
        'dtj_deskripsi',
        'dtj_tanggal',
        'dts_status',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}