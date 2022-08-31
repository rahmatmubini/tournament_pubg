<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Team extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['tournament'];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function matchPUBGs()
    // {
    //     return $this->hasMany(MatchPUBG::class);
    // }

    public function standing()
    {
        return $this->hasMany(Standing::class);
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
