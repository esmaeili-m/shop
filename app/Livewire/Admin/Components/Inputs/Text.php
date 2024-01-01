<?php

namespace App\Livewire\Admin\Components\Inputs;

use Livewire\Component;

class Text extends Component
{
    public $label;
    public $placeholder;
//    public $title;

    public function mount($label,$placeholder)
    {
        $this->label=$label;
        $this->placeholder=$placeholder;
    }
    public function render()
    {
        return view('livewire.admin.components.inputs.text');
    }
}
