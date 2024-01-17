<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PIC extends Model
{
    protected $table = 'pkm_mspicpkkmb';
    protected $primaryKey = 'pic_nokaryawan';
    public $timestamps = false;

    protected $fillable = [
        'pic_nokaryawan',
         'pic_nama',
        'pic_password',
        'pic_status',
    ];
    

    // Additional model logic, relationships, etc. can be added here

    public function __construct(array $attributes = [])
{
    parent::__construct($attributes);

    // Generate UUID versi 4
    if (!isset($this->attributes['pic_nokaryawan'])) {
        $uuid = Uuid::uuid4()->toString();
        $this->attributes['pic_nokaryawan'] = substr($uuid, 0, 10); // Ambil 10 karakter pertama
    }
}

}