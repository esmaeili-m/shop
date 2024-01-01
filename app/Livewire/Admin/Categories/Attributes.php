<?php

namespace App\Livewire\Admin\Categories;

use App\Models\AttributesCategory;
use Livewire\Component;

class Attributes extends Component
{
    public $search='';
    public $title;
    public $ids;
    public $category_id;
    public $attributes_id;
    public $new_title;
    protected $queryString = ['search'];
    protected $rules=[
        'title'=>'required',
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان الزامی می باشد.',
        ];
    }
    public function mount($id)
    {
        $this->category_id=$id;
    }

    public function save()
    {
        $this->validate();
        AttributesCategory::create([
            'title'=>$this->title,
            'category_id'=>$this->category_id
        ]);
        $this->title='';
        $this->dispatch('item-create');
    }
    public function update(){
        if ($this->new_title){
            AttributesCategory::where('id',$this->attributes_id)->update([
                'title'=>$this->new_title,
            ]);
            $this->dispatch('update_attributes',title:$this->new_title);
        }else{
            $this->dispatch('errortitle',title:'فیلد عنوان الزامی می باشد');
        }
    }

    public function updateData($id)
    {
        $this->new_title=AttributesCategory::where('id',$id)->value('title');
        $this->attributes_id=$id;
        $this->dispatch('set-data',title:$this->new_title);
    }
    public function delete($id)
    {
        $item=AttributesCategory::find($id);
        $this->dispatch('item-delete',title:$item->title);
        $item->delete();
    }
    public function render()
    {
        $data=AttributesCategory::where('title','LIKE','%'.$this->search.'%')->where('category_id',$this->category_id)->orderBy('id','desc')->get();
        return view('livewire.admin.categories.attributes',compact('data'));
    }
}
