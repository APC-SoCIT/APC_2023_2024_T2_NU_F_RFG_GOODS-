<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatabaseLayout extends Component
{
    public $title;
    public $modal;

    public function __construct($title, $modal)
    {
        $this->title = $title;
        $this->modal = $modal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.database-layout');
    }
}
