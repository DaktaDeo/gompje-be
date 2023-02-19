<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class MasterLayout extends Component
{
    public Post $post;

    public function __construct(Post|null $post = null)
    {
        $this->post = $post ?? new Post();
    }

    public function render()
    {
        return view('layouts.master', [
            'post' => $this->post,
        ]);
    }
}
