<?php

namespace App\Livewire\Admin\Post\Attributes;

use App\Models\AttributesPosts;
use App\Models\Posts;
use Livewire\Component;

class Index extends Component
{
    public $search='';
    public $title;
    public $value;
    public $type;
    public $new_value;
    public $ids;
    public $post_id;
    public $attributes_id;
    public $new_title;
    protected $queryString = ['search'];
    protected $rules=[
        'title'=>'required',
        'value'=>'required',
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان الزامی می باشد.',
            'value.required' => 'این فیلد الزامی می باشد.',
        ];
    }
    public function mount($id)
    {
        $this->post_id=$id;
    }

    public function save()
    {
        $this->validate();
        AttributesPosts::create([
           'title'=>$this->title,
           'value'=>$this->value,
           'post_id'=>$this->post_id
        ]);
        $this->title='';
        $this->value='';
        $this->dispatch('item-create');
    }
    public function update(){
        if ($this->new_title && $this->new_value){
            AttributesPosts::where('id',$this->attributes_id)->update([
                'title'=>$this->new_title,
                'value'=>$this->new_value,
            ]);
            $this->dispatch('update_attributes',title:$this->new_title);
        }else{
            if (!$this->new_title){
                $this->dispatch('errortitle',title:'فیلد عنوان الزامی می باشد');
            }
            if(!$this->new_value){
                $this->dispatch('errorvalue',title:'فیلد مقدار الزامی می باشد');
            }
            if(!$this->new_title && !$this->new_value){
                $this->dispatch('errorall',title:'فیلد مقدار الزامی می باشد',value:'فیلد مقدار الزامی می باشد');
            }
        }
    }

    public function updateData($id)
    {
        $this->new_title=AttributesPosts::where('id',$id)->value('title');
        $this->new_value=AttributesPosts::where('id',$id)->value('value');
        $this->attributes_id=$id;
        $this->dispatch('set-data',title:$this->new_title,value:$this->new_value);
    }
    public function delete($id)
    {
        $item=AttributesPosts::find($id);
        $this->dispatch('item-delete',title:$item->title);
        $item->delete();
    }
    public function render()
    {
        $data=AttributesPosts::where('title','LIKE','%'.$this->search.'%')->where('post_id',$this->post_id)->orderBy('id','desc')->get();
        return view('livewire.admin.post.attributes.index',compact('data'));
    }
}
