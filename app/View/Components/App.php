<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $style;
    public $script;

    public function __construct(
      $title = 'tidak diketahui',
      $style = null,
      $script = null
      )
    {
      $this->title = $title;
      $this->style = $style;
      $this->script = $script;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app');
    }
}
