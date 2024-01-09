<?php

namespace App\Livewire\Admin\Post;

use App\Models\Posts;
use App\Models\SeoPost;
use Livewire\Component;

class Seo extends Component
{
    public $post;
    public $tag_type;
    public $content;
    public function mount($id)
    {
        $this->post=Posts::find($id);
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
        SeoPost::create([
            'content'=>$this->content,
            'post_id'=>$this->post->id,
            'tag_type'=>$this->tag_type
        ]);
        $this->content='';
        $this->dispatch('item-create');
    }

    public function delete($id)
    {
        $item=SeoPost::find($id);
        $this->dispatch('item-delete',title:$item->tag_type);
        $item->delete();
    }
    public function render()
    {
        $data=SeoPost::get();
        return view('livewire.admin.post.seo',compact('data'));
    }
}
