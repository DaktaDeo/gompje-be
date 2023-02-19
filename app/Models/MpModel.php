<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Jenssegers\Model\Model;

abstract class MpModel extends Model
{
    public string $key = '';

    public string $view = '';

    public string $last_modified = '';

    public array $frontMatter = [];

    public string $content;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_modified' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

//        static::addGlobalScope('order', static function ($query) {
//            $query->orderBy('date', 'desc');
//        });
    }

    public function getSlugAttribute(): string
    {
        // remove index from the end of the slug
        if (Str::endsWith($this->view, '/index')) {
            return Str::slug(Str::beforeLast($this->view, '/index'));
        }

        return Str::slug($this->view);
    }

    public function getDateAttribute(): string
    {
        $date = data_get($this->frontMatter, 'date', $this->last_modified);

        // create date from int
        if (is_int($date)) {
            return Carbon::createFromTimestamp($date)->format('Y-m-d H:i:s');
        }

        return '';
    }

    public function getTitleAttribute(): string
    {
        return data_get($this->frontMatter, 'title', '');
    }

    public function getAuthorAttribute(): string
    {
        return data_get($this->frontMatter, 'author', '');
    }

    //get the tags from the frontmatter
    public function getTagsAttribute(): array
    {
        return data_get($this->frontMatter, 'tags', []);
    }

    public function hasTitle(): bool
    {
        return ! empty($this->title);
    }

    public function hasAuthor(): bool
    {
        return ! empty($this->author);
    }

    public function hasTags(): bool
    {
        return ! empty($this->tags);
    }

    public function hasDate(): bool
    {
        return ! empty($this->date);
    }
}
