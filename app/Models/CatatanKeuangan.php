<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKeuangan extends Model
{
    protected $fillable = [
        'user_id', 'type', 'total', 'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
