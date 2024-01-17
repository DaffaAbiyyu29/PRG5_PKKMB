<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Jadwal extends Model
{
    protected $table = 'pkm_msjadwal';
    protected $primaryKey = 'jdl_idjadwal';
    public $timestamps = false;

    protected $fillable = [
        'jdl_idjadwal', 
        'jdl_nim',
        'jdl_tglpelaksanaan',
        'jdl_waktupelaksanaan',
        'jdl_agenda',
        'jdl_tempat',
        'jdl_status',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
    protected $casts = [
        'jdl_idjadwal' => 'string'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateIdJadwal();
        });
    }

    public function generateIdJadwal()
    {
        if (!isset($this->attributes['jdl_idjadwal'])) {
            $uuid = Uuid::uuid4()->toString();
            $this->attributes['jdl_idjadwal'] = 'JDL00' . substr($uuid, 1, 1); 
        }
    }
}
