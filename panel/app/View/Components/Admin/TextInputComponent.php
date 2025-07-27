<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInputComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public  $label;
    public  $name;
    public  $text;
    public  $type;
    public function __construct($label, $name, $text=null,$type="text")
    {
        $this->label =$label;
        $this->name =$name;
        $this->text =$text;
        $this->type =$type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.text-input-component');
    }
}
