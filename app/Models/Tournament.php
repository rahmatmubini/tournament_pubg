<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tournament extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['game', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['game'] ?? false, function ($query, $game) {
            return $query->whereHas('game', function ($query) use ($game) {
                $query->where('slug', $game);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }

    public function point()
    {
        return $this->belongsTo(Point::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }

    public function hastags()
    {
        return $this->hasMany(Hastag::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
