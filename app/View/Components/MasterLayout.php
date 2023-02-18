<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MasterLayout extends Component
{
    public ?string $title;

    public function __construct(string|null $title = '')
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('layouts.master', [
            'title' => $this->title,
        ]);
    }
}
