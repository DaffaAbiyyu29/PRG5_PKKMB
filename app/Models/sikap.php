<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Sikap extends Model
{
    protected $table = 'pkm_trnilaisikap';
    protected $primaryKey = 'nls_idsikap';
    protected $foreignKey = 'nls_nopendaftaran';
     protected $foreignKey2 = 'nls_nim';
    public $timestamps = false;

    protected $fillable = [
        'nls_idnilaisikap',
        'nls_nopendaftaran',
        'nls_nim',
        'nls_sikap',
        'nls_tanggal',
        'nls_status',
    ];
    

    // Additional model logic, relationships, etc. can be added here

    public function __construct(array $attributes = [])
{
    parent::__construct($attributes);

    // Generate UUID versi 4
    if (!isset($this->attributes['nls_idsikap'])) {
        $uuid = Uuid::uuid4()->toString();
        $this->attributes['nls_idsikap'] = substr($uuid, 0, 10); // Ambil 10 karakter pertama
    }
}

}