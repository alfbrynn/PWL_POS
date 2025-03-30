<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplierModel extends Model
{
    use HasFactory;

        protected $table = 'm_suplier'; // Sesuaikan dengan nama tabel yang benar
    protected $primaryKey = 'suplier_id';

    protected $fillable = ['nama_suplier', 'alamat_suplier', 'kontak_suplier']; // Field yang bisa diisi
}
