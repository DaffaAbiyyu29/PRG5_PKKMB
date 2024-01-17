<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PKKMB extends Model
{
    protected $table = 'trdetailtugas';
    protected $primaryKey = 'dts_iddetail';
    public $timestamps = false;

    protected $fillable = [
        'dts_iddetail',
         'dts_nopendaftaran',
         'dts_filetugas',
         'dts_waktupengumpulan',
         'dts_nilaitugas',
         
    ];
    

    // Additional model logic, relationships, etc. can be added here

    public function __construct(array $attributes = [])
{
    parent::__construct($attributes);

    // Generate UUID versi 4
    if (!isset($this->attributes['dts_iddetail'])) {
        $uuid = Uuid::uuid4()->toString();
        $this->attributes['dts_iddetail'] = substr($uuid, 0, 10); // Ambil 10 karakter pertama
    }
}

}