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

        $post = Post::where('slug', $view)->first();
        if ($post === null) {
            abort(404);
        }

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
}
