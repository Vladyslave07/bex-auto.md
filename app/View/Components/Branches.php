<?php

namespace App\View\Components;

use App\Models\Branch;
use App\Models\Domain;
use Illuminate\View\Component;

class Branches extends Component
{
    public $branches;
    public $domains;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->domains = Domain::list();
        $this->branches = Branch::query()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.branches');
    }
}
