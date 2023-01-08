<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class PengajuanSktm extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'nik',
        'nama',
        'email',
        'jenis_kelamin',
        'agama',
        'pob',
        'dob',
        'address',
        'pendidikan',
        'pekerjaan',
        'status',
        'is_deleted'
    ];

    // protected $hidden = [
    //     'nik',
    // ];

    // public static function configureCipherSweet(EncryptedRow $encryptedRow): void
    // {
    //     $encryptedRow
    //         ->addField('nik')
    //         ->addBlindIndex('nik', new BlindIndex('nik_index'));
    // }

    // protected function nik(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Crypt::decryptString($value),

    //     );
    // }

    protected $table = 'tbl_data_pengajuan';
}
