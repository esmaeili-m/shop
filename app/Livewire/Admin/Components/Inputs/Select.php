<?php

namespace App\Livewire\Admin\Components\Inputs;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Select extends Component
{
    public $label;
    public $data;
    public $placeholder;
//    public $title;

    public function mount($label,$placeholder,$data)
    {
        $this->data=$data;
        $this->label=$label;
        $this->placeholder=$placeholder;
    }
    public function render()
    {
        return view('livewire.admin.components.inputs.select');
    }
}
