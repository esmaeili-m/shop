<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $category;
    public $title;
    public $description;
    public $slug;
    public $parent_id;
    public $image;
    public $old_slug;
    public $new_image;
    public function mount($id)
    {
        $this->category=Category::find($id);
        $this->title=$this->category->title;
        $this->description=$this->category->description;
        $this->slug=$this->category->slug;
        $this->old_slug=$this->category->slug;
        $this->parent_id=$this->category->parent_id;
        $this->image=$this->category->image;
//        $this->new_image=$this->category->im;
    }
    protected $rules=[
        'title'=>'required',
        'slug'=>'required',
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
        if($this->slug != $this->old_slug){
            $validated = Validator::make(
                ['slug' => $this->slug],
                ['slug' => 'unique:categories,slug'],
                ['slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.'],
            )->validate();
        }
        $this->validate();
        if($this->new_image){
            unlink(public_path($this->image));
            $this->image = $this->UploadImage();

        }
        $this->category->update([
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
        $imageName = $this->new_image->getClientOriginalName();
        $this->new_image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function remove_image()
    {
        unlink(public_path($this->image));
        $this->image='';
        $this->category->update([
            'image'=>null
        ]);
    }
    public function render()
    {
        return view('livewire.admin.categories.update');
    }
}
