<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class SorterComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $stuffs = array();
    public $query_title;
    public $model_alias;
    public $model_alias_plural;

    public function __construct($stuffs, $queryTitle, $modelAlias)
    {
        $this->stuffs = $stuffs;
        $this->query_title = $queryTitle;
        $this->model_alias = $modelAlias;
        $this->model_alias_plural = Str::of($this->model_alias)->plural();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sorter-component');
    }
}
