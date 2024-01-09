<?php

namespace App\Livewire\Admin\Categories;

use App\Models\SeoCategory;
use Livewire\Component;

class SeoUpdate extends Component
{
    public $content;
    public $seo;
    public $tag_type;
    public function mount($id)
    {
        $this->seo=SeoCategory::find($id);
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
        return redirect()->route('category.seo',$this->seo->category_id);
    }
    public function render()
    {
        return view('livewire.admin.categories.seo-update');
    }
}
