<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title, $slug, $description, $image, $parent_id;
    protected $rules=[
      'title'=>'required',
      'slug'=>'required|unique:categories,slug',
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان الزامی می باشد.',
            'slug.required' => 'فیلد آدرس الزامی می باشد.',
            'slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.',
        ];
    }
    public function create()
    {

        $this->validate();
        if($this->image){
            $this->image = $this->UploadImage();
        }
        Category::create([
           'title'=> $this->title,
           'slug'=> $this->slug,
           'description'=> $this->description,
           'image'=> $this->image,
           'parent_id'=> $this->parent_id,
        ]);
        return redirect()->route('category.list');
    }

    public function UploadImage()
    {
        $directory = 'category/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function render()
    {
        return view('livewire.admin.categories.create');
    }
}
