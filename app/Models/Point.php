<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function hastags()
    {
        return $this->hasMany(Hastag::class);
    }
}
