<?php

namespace App\Livewire\Admin\Post\Brand;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    public $image;
    public $title;
    public $link;
    public $category_id;
    use WithFileUploads;
    protected $rules=[
        'title'=>'required',
        'link'=>'required',
        'category_id'=>'required',
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد نام الزامی می باشد.',
            'link.required' => 'فیلد لینک الزامی می باشد.',
            'category_id.required' => 'فیلد دسته بندی الزامی می باشد.',

        ];
    }
    public function create()
    {
        $this->validate();
        if ($this->image){
            $this->image=$this->UploadImage();
        }
        Brands::create([
            'title'=>$this->title,
            'logo'=>$this->image,
            'slug'=>$this->link,
            'category_id'=>$this->category_id,

        ]);
        $this->link='';
        $this->title='';
        $this->image=null;
        $this->dispatch('item-create');
    }
    public function UploadImage()
    {
        $directory = 'posts/brand/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function status($id,$status)
    {
        Brands::find($id)->update([
            'status'=>$status
        ]);
        $this->dispatch('item-update-status');
    }
    public function delete($id)
    {
        $item=Brands::find($id);
        $this->dispatch('item-delete',title:$item->title);
        $item->delete();
    }
    public function render()
    {
        $data=Brands::get();
        return view('livewire.admin.post.brand.index',compact('data'));
    }
}
