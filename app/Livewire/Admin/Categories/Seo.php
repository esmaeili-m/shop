<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\SeoCategory;
use Livewire\Component;

class Seo extends Component
{
    public $category;
    public $tag_type;
    public $content;
    public function mount($id)
    {
        $this->category=Category::find($id);
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
        SeoCategory::create([
           'content'=>$this->content,
           'category_id'=>$this->category->id,
           'tag_type'=>$this->tag_type
        ]);
        $this->content='';
        $this->dispatch('item-create');
    }

    public function delete($id)
    {
        $item=SeoCategory::find($id);
        $this->dispatch('item-delete',title:$item->tag_type);
        $item->delete();
    }
    public function render()
    {
        $data=SeoCategory::get();
        return view('livewire.admin.categories.seo',compact('data'));
    }
}
