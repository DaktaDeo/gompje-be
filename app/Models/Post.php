<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Post extends MpModel
{
    protected $attributes = [
        'title' => '',
        'excerpt' => '',
        'date' => 0,
        'is_draft' => true,
        'tags' => [],
        'header_image' => '',
        'list_image' => '',
        'is_compact' => false,
        'content' => null,
        'key' => null,
        'view' => null,
        'last_modified' => null,
        'frontMatter' => [],
        'path' => '',
        'category' => '',
    ];

    protected $casts = [
        'date' => 'datetime',
        'is_draft' => 'boolean',
        'tags' => 'array',
        'is_compact' => 'boolean',
        'last_modified' => 'datetime',
        'frontMatter' => 'array',
    ];

    protected $visible = [
        'title',
        'excerpt',
        'date',
        'is_draft',
        'tags',
        'header_image',
        'list_image',
        'is_compact',
        'slug',
        'readable_release',
        'content',
        'key',
        'view',
        'last_modified',
        'path',
        'category',
    ];

    protected $fillable = [
        'title',
        'excerpt',
        'date',
        'is_draft',
        'tags',
        'header_image',
        'list_image',
        'is_compact',
        'content',
        'key',
        'view',
        'last_modified',
        'path',
        'category',
    ];

    public function processFrontMatter(): void
    {
        $this->fill($this->frontMatter);
        $this->handleReleaseDate();
        $this->handleCategory();
    }

    private function handleCategory(): void
    {
        $this->category = Str::beforeLast($this->view, '/');
    }

    private function handleReleaseDate(): void
    {
        //if release date is set, create carbon
        if (data_get($this->frontMatter, 'date') !== null) {
            $this->release_date = Carbon::createFromTimestamp($this->date);
        } else {
            $this->release_date = null;
        }

        // if release date is not null, set isDraft to false
        if (! is_null($this->release_date)) {
            $this->is_draft = false;
        }
    }

    public function getSlugAttribute(): string
    {
        // remove index from the end of the slug
        if (Str::endsWith($this->view, '/index')) {
            return Str::slug(Str::beforeLast($this->view, '/index'));
        }

        return Str::slug($this->view);
    }

    public function getReadableReleaseAttribute(): string
    {
        if ($this->is_draft) {
            return 'Draft';
        }

        return ($this->release_date->isFuture() ? 'Planned for ' : '').$this->release_date->diffForHumans();
    }

    public function getReadingTimeAttribute(): int
    {
        $word = str_word_count(strip_tags($this->content));
        $minutes = (int) floor($word / 200);

        return $minutes > 0 ? $minutes : 1;
    }

    public function isReleased(): bool
    {
        // return true when release date is in the past or null and this post is not a draft
        return $this->release_date->isPast() || (is_null($this->release_date) && ! $this->is_draft);
    }

    // generate permalink for this post
    public function getPermalinkAttribute(): string
    {
        return route('any', $this->slug);
    }
}
