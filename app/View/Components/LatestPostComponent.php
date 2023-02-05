<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class LatestPostComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $posts = Post::latest()->get();
        return view('components.latest-post-component',\compact('posts'));
    }
}
