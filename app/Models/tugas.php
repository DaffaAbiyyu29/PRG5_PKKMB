<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Tugas extends Model
{
    protected $table = 'pkm_trtugas';
    protected $primaryKey = 'tgs_idtugas';
    protected $foreignKey = 'tgs_nim';
    public $timestamps = false;

    protected $fillable = [
        'tgs_idtugas',
        'tgs_nim',
        'tgs_namatugas',
        'tgs_tglpemberiantugas',
        'tgs_filetugas',
        'tgs_deadline',
        'tgs_deskripsi',
        'tgs_status',
    ];
    

    // Additional model logic, relationships, etc. can be added here

    public function __construct(array $attributes = [])
{
    parent::__construct($attributes);

    // Generate UUID versi 4
    if (!isset($this->attributes['tgs_idtugas'])) {
        $uuid = Uuid::uuid4()->toString();
        $this->attributes['tgs_idtugas'] = substr($uuid, 0, 10); // Ambil 10 karakter pertama
    }
}

}