<?php

namespace App\Livewire\Admin\Post;

use App\Models\SeoPost;
use Livewire\Component;

class SeoUpdate extends Component
{
    public $content;
    public $seo;
    public $tag_type;
    public function mount($id)
    {
        $this->seo=SeoPost::find($id);
        $this->content=$this->seo->content;
        $this->tag_type=$this->seo->tag_type;
    }

    protected $rules=[
        'content'=>'required',
        'tag_type'=>'required'
    ];
    public function messages()
    {
        return [
            'content.required' => 'فیلد محتوا الزامی می باشد.',
            'tag_type.required' => 'فیلد تگ الزامی می باشد.',
        ];
    }
    public function create()
    {
        $this->validate();
        $this->seo->update([
            'content'=>$this->content,
            'tag_type'=>$this->tag_type
        ]);
        return redirect()->route('post.seo',$this->seo->post_id);
    }
    public function render()
    {
        return view('livewire.admin.post.seo-update');
    }
}
