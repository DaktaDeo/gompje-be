<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
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

        $wantedFile = $this->getWantedFileFromView($view);

        ray($wantedFile);

        $result = Markdown::convert($this->disk->get($wantedFile));
        $frontMatter = [];

        if ($result instanceof RenderedContentWithFrontMatter) {
            $frontMatter = $result->getFrontMatter();
        }
        $content = $result->getContent();

        ray($frontMatter, $content);

        return view('post', [
            'content' => $content,
            'frontMatter' => $frontMatter,
            'title' => data_get($frontMatter, 'title'),
            'author' => data_get($frontMatter, 'author'),
            'date' => data_get($frontMatter, 'date'),
        ]);

        abort(404);

        dd('stop');

        $post = Post::where('slug', $view)->first();
        if ($post === null) {
            abort(404);
        }

        ray($post, $view);
        dd('tstop');

        $result = Markdown::convert('content/'.$view);
        $frontMatter = [];

        if ($result instanceof RenderedContentWithFrontMatter) {
            $frontMatter = $result->getFrontMatter();
        }

        return view('post', [
            'content' => $result->getContent(),
            'frontMatter' => $frontMatter,
            'post' => $post,
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
}
