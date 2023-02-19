<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostPreview extends Component
{
    public Post $post;

    public string $readMoreText = 'Read more &rarr;';

    public function __construct(Post $post, string $readMoreText = '')
    {
        $this->post = $post;
        $this->readMoreText = $readMoreText;
    }

    public function render(): View
    {
        return view('components.post-preview', [
            'post' => $this->post,
            'readMoreText' => $this->readMoreText,
        ]);
    }
}
