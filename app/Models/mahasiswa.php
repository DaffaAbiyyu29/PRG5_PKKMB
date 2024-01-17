<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Mahasiswa extends Model
{
    protected $table = 'pkm_msmahasiswa';
    protected $primaryKey = 'mhs_nopendaftaran';
    protected $foreignKey = 'mhs_idkelompok';
     protected $foreignKey2 = 'mhs_idpkkmb';
    public $timestamps = false;

    protected $fillable = [
        'mhs_nopendaftaran',
        'mhs_namalengkap',
        'mhs_gender',
        'mhs_programstudi',
        'mhs_alamat',
        'mhs_notelepon',
        'mhs_email',
        'mhs_password',
        'mhs_kategori',
        'mhs_idkelompok',
        'mhs_idpkkmb',
        'mhs_statuskelulusan',
        'mhs_saran',
        'mhs_kritik',
        'mhs_insight',
        'mhs_tglkirimevaluasi',
        'mhs_jamplus',
        'mhs_jamminus',
        'mhs_status',
    ];
    

    // Additional model logic, relationships, etc. can be added here

    public function __construct(array $attributes = [])
{
    parent::__construct($attributes);

    // Generate UUID versi 4
    if (!isset($this->attributes['mhs_nopendaftaran'])) {
        $uuid = Uuid::uuid4()->toString();
        $this->attributes['mhs_nopendaftaran'] = substr($uuid, 0, 10); // Ambil 10 karakter pertama
    }
}

}