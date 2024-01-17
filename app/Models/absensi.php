<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Absensi extends Model
{
    protected $table = 'pkm_trabsensi';
    protected $primaryKey = 'abs_idabsensi';
    protected $foreignKey = 'abs_nopendaftaran';
    public $timestamps = false;

    protected $fillable = [
        'abs_idabsensi',
        'abs_nim',
        'abs_nopendaftaran',
        'abs_tglkehadiran',
        'abs_statuskehadiran',
        'abs_keterangan',
        'abs_status',
    ];
    
    public function __construct(array $attributes = []){

        parent::__construct($attributes);
    }
    protected static function boot()
       {
           parent::boot();
   
           static::creating(function ($model) {
               $model->generateIdAbsensi();
           });
       }
   
       public function generateIdAbsensi()
       {
           if (!isset($this->attributes['abs_idabsensi'])) {
               $uuid = Uuid::uuid4()->toString();
               $this->attributes['abs_idabsensi'] = 'ABS00' . substr($uuid, 1, 1); 
           }
       }
       
}
