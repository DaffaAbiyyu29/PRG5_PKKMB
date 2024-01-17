<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Kelompok extends Model
{
    protected $table = 'pkm_mskelompok';
    protected $primaryKey = 'kmk_idkelompok';
    protected $foreignKey = 'kmk_idruangan';
    protected $foreignKey2 = 'kmk_idruangan';
    public $timestamps = false;

    protected $fillable = [
        'kmk_idkelompok', 
        'kmk_idruangan',
        'kmk_namakelompok',
        'kmk_nim',
        'kmk_status',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
    protected $casts = [
        'kmk_idkelompok' => 'string'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateInfIdKelompok(); 
        });
    }
    public function generateInfIdKelompok()
    {
        if (!isset($this->attributes['kmk_idkelompok'])) {
            $uuid = Uuid::uuid4()->toString();
            $numericSuffix = substr(preg_replace("/[^0-9]/", "", $uuid), 0, 4); 
            $this->attributes['kmk_idkelompok'] = 'KMK' . $numericSuffix;
        }
    }
}
