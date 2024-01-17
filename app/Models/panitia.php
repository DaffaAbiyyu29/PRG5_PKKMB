<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Panitia extends Model
{
    protected $table = 'pkm_mskesekretariatan';
    protected $primaryKey = 'ksk_nim';
    public $timestamps = false;

    protected $fillable = [
        'ksk_nim', // Ubah nama kolom menjadi sesuai dengan primaryKey
        'ksk_nama', 
        'ksk_jeniskelamin',
        'ksk_programstudi',
        'ksk_password', // Ubah nama kolom menjadi sesuai dengan primaryKey
        'ksk_role',
        'ksk_notelepon',
        'ksk_email',
        'ksk_alamar',
        'ksk_status',
    ];

    // Additional model logic, relationships, etc. can be added here

    public function __construct(array $attributes = [])
{
    parent::__construct($attributes);

    // Generate UUID versi 4
    if (!isset($this->attributes['ksk_nim'])) {
        $uuid = Uuid::uuid4()->toString();
        $this->attributes['ksk_nim'] = substr($uuid, 0, 10); // Ambil 10 karakter pertama
    }
}

}
