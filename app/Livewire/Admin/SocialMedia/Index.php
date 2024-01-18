<?php

namespace App\Livewire\Admin\SocialMedia;

use App\Models\SocialMedia;
use Livewire\Component;

class Index extends Component
{
    public $link;
    public $title;
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
        SocialMedia::create([
            'title'=>$this->title,
            'link'=>$this->link,
        ]);
        $this->link='';
        $this->dispatch('item-create');
    }
    public function status($id,$status)
    {
        SocialMedia::find($id)->update([
            'status'=>$status
        ]);
        $this->dispatch('item-update-status');
    }
    public function delete($id)
    {
        $item=SocialMedia::find($id);
        $this->dispatch('item-delete',title:$item->title);
        $item->delete();
    }
    public function render()
    {
        $data=SocialMedia::get();
        return view('livewire.admin.social-media.index',compact('data'));
    }
}
