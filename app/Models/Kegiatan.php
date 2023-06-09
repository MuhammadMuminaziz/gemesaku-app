<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function judul_kegiatan()
    {
        return $this->belongsTo(JudulKegiatan::class);
    }
}
