<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hastag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }
}
