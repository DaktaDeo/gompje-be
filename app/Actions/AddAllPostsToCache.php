<?php

namespace App\Actions;

class AddAllPostsToCache extends FileAction
{
    public function __invoke()
    {
        $files = app(GetRelevantFilesFromFolder::class)('.');

        $posts = $files->map(function ($file) {
            return app(ParseMarkdownFile::class)($file);
        });
    }
}
