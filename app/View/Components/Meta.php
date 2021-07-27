<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Meta extends Component
{

    public $metaDescription;
    public $metaPageType;
    public $metaImage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metaDescription, $metaPageType, $metaImage)
    {
        //
        $this->metaDescription = $metaDescription;
        $this->metaPageType = $metaPageType;
        $this->metaImage = $metaImage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.meta');
    }
}
