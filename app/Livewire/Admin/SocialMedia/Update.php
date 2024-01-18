<?php

namespace App\Livewire\Admin\SocialMedia;

use App\Models\SocialMedia;
use Livewire\Component;

class Update extends Component
{
    public $link;
    public $title;
    public $social;

    public function mount($id)
    {
        $this->social=SocialMedia::find($id);
        $this->title=$this->social->title;
        $this->link=$this->social->link;
    }
    protected $rules=[
        'title'=>'required',
        'link'=>'required'
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد سوشیال الزامی می باشد.',
            'link.required' => 'فیلد لینک الزامی می باشد.',
        ];
    }
    public function create()
    {
        $this->validate();
        $this->social->update([
            'title'=>$this->title,
            'link'=>$this->link,
        ]);
        return redirect()->route('social.list');
    }
    public function render()
    {
        return view('livewire.admin.social-media.update');
    }
}
