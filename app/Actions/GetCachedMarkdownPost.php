<?php

namespace App\Actions;

use App\Models\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Cache;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;

class GetCachedMarkdownPost extends FileAction
{
    public function __invoke(string $view): Post
    {
        $wantedFile = app(GetWantedFileName::class)($view);
        $lastModified = $this->disk->lastModified($wantedFile);

        $key = $view.$lastModified;

        //check if cache exists with this $key
        if (Cache::has($key) && (app()->environment() !== 'local')) {
            return Cache::get($key);
        }

        //remove old caches in Redis that start with $view
        $keys = Cache::getRedis()->keys($view.'*');
        foreach ($keys as $key) {
            Cache::forget($key);
        }

        $result = Markdown::convert($this->disk->get($wantedFile));

        if ($result instanceof RenderedContentWithFrontMatter) {
            $frontMatter = $result->getFrontMatter();
        }

        $post = new Post([
            'key' => $key,
            'view' => $view,
            'last_modified' => $lastModified,
            'frontMatter' => $frontMatter ?? [],
            'content' => $result->getContent(),
        ]);

        if (app()->environment() !== 'local') {
            Cache::forever($key, $post);
        }

        return $post;
    }
}
