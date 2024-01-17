<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Ruangan extends Model
{
    protected $table = 'pkm_msruangan';
    protected $primaryKey = 'rng_idruangan';
    public $timestamps = false;

    protected $fillable = [
        'rng_idruangan', // Ubah nama kolom menjadi sesuai dengan primaryKey
        'rng_namaruangan',
        'rng_status',
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
    protected $casts = [
        'rng_idruangan' => 'string'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateIdRuangan();
        });
    }

    public function generateIdRuangan()
    {
        if (!isset($this->attributes['rng_idruangan'])) {
            $uuid = Uuid::uuid4()->toString();
            $this->attributes['jdl_idjadwal'] = 'JDL00' . substr($uuid, 1, 1); 
        }
    }

}
