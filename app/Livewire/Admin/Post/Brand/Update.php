<?php

namespace App\Livewire\Admin\Post\Brand;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    public $image;
    public $title;
    public $link;
    public $brand;
    public $category_id;
    public $old_image;
    use WithFileUploads;

    public function mount($id)
    {
        $this->brand=Brands::find($id);
        $this->title=$this->brand->title;
        $this->category_id=$this->brand->category_id;
        $this->link=$this->brand->slug;
        $this->image=$this->brand->logo;
    }
    public function updatingImage()
    {
        if (file_exists(public_path().'\\'.$this->image)){
            $this->old_image=public_path().'\\'.$this->image;
        }
    }
    public function updatedImage()
    {
        $this->image = $this->UploadImage();
    }
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
        $this->brand->update([
            'title'=>$this->title,
            'logo'=>$this->image,
            'slug'=>$this->link,
            'category_id'=>$this->category_id,

        ]);
        if($this->old_image){
            unlink($this->old_image);
        }
        return redirect()->route('brand.list');
    }
    public function UploadImage()
    {
        $directory = 'posts/brand/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function render()
    {
        return view('livewire.admin.post.brand.update');
    }
}
