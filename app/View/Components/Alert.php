<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $msg;
    public function __construct($msg)
    {
        $this->msg = $msg;
    }
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
