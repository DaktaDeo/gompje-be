<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Sushi\Sushi;

abstract class MpSushiModel extends Model
{
    use Sushi;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', static function ($query) {
            $query->orderBy('date', 'desc');
        });
    }

    public function getSlugAttribute(): string
    {
       return Str::slug($this->title);
    }

    public function getYearAttribute(): string
    {
        $year = $this->date->format('Y');

        if ($year < 2020) {
            return 'Much (Much) Older';
        }

        return $year;
    }
}
