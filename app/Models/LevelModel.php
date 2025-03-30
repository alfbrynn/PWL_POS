<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{

    protected $table = 'm_level'; // Sesuaikan dengan nama tabel yang benar
    protected $primaryKey = 'level_id';

    protected $fillable = ['level_kode', 'level_nama']; // Field yang bisa diisi
}