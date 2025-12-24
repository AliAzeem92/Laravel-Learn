<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class massageBanner extends Component
{
    public $msg;
    public $style;
    /**
     * Create a new component instance.
     */
    public function __construct($msg, $style)
    {
        $this->msg = $msg;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.massage-banner');
    }
}
