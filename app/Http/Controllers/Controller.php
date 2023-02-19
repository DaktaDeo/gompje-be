<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Filesystem $disk;

    protected String $contentPath = 'content/';

    public function __construct()
    {
        $this->disk = Storage::disk('content');
    }

    public function show($view = 'index')
    {
        if ($this->disk->exists($view.'.blade.php')) {
            return view($view, [
                'view' => $view,
            ]);
        }

        return view('post', [
            'post' => $this->getContentFromCache($view),
        ]);
    }

    private function getWantedFileFromView(string $view): string
    {
        $wantedFile = "$view.md";
        if (! $this->disk->exists($wantedFile)) {
            $wantedFile = "$view/index.md";

            if (! $this->disk->exists($wantedFile)) {
                abort(404);
            }

            return $wantedFile;
        }

        return $wantedFile;
    }

    public function getContentFromCache(string $view): Post
    {
        $wantedFile = $this->getWantedFileFromView($view);
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
