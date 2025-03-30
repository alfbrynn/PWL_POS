<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    protected $table = 'm_kategori'; // Sesuaikan dengan nama tabel yang benar
    protected $primaryKey = 'kategori_id';

    protected $fillable = ['kategori_code', 'kategori_nama']; // Field yang bisa diisi
}