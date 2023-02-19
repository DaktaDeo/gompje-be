<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Post extends MpModel
{
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

    // get the excerpt from the frontmatter
    public function getExcerptAttribute(): string
    {
        return data_get($this->frontMatter, 'excerpt', '');
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

//get the blurb image fro
    public function getBlurbImageAttribute(): string
    {
        return data_get($this->frontMatter, 'blurb.image', '');
    }

    // get the blurb text from the frontmatter
    public function getBlurbTextAttribute(): string
    {
        return data_get($this->frontMatter, 'blurb.text', '');
    }

    // get the blurb object from the frontmatter
    public function getBlurbAttribute(): array
    {
        return data_get($this->frontMatter, 'blurb', []);
    }

    //get the tagline from the frontmatter
    public function getTaglineAttribute(): string
    {
        return data_get($this->frontMatter, 'tagline', '');
    }

    // get is compact post from the frontmatter
    public function getIsCompactAttribute(): bool
    {
        return data_get($this->frontMatter, 'isCompact', false);
    }

    // get a given attribute from this model and check if it is empty
    public function hasAttribute(string $attribute): bool
    {
        return ! empty($this->$attribute);
    }

    // generate permalink for this post
    public function getPermalinkAttribute(): string
    {
        return route('any', ['slug' => $this->slug]);
    }
}
