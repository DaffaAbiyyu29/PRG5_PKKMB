<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Informasi extends Model
{
    protected $table = 'pkm_msinformasi';
    protected $primaryKey = 'inf_idinformasi';
    public $timestamps = false;

    protected $fillable = [
        'inf_idinformasi', 
        'inf_nim', 
        'inf_jenisinformasi',
        'inf_namainformasi',
        'inf_tglpublikasi', 
        'inf_deskripsi',
        'inf_status',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
    protected $casts = [
        'inf_idinformasi' => 'string'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateInfIdInformasi(); 
        });
    }
    public function generateInfIdInformasi()
    {
        if (!isset($this->attributes['inf_idinformasi'])) {
            $uuid = Uuid::uuid4()->toString();
            $this->attributes['inf_idinformasi'] = 'INF00' . substr($uuid, 1, 1); 
        }
    }
}
