<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    public $article;
    public $option;
    public $tags=[];
    public $image;
    public $title;
    public $slug;
    public $input=[];
    public $attributesCategory;
    public $category_id;
    public $brand;
    public $description;
    use WithFileUploads;
    protected $rules=[
        'title'=>'required',
        'category_id'=>'required',
        'slug'=>'required' ,
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان الزامی می باشد.',
            'slug.required' => 'فیلد آدرس الزامی می باشد.',
            'category_id.required' => 'فیلد دسته بندی الزامی می باشد.',
        ];
    }
    public function mount($id)
    {
        $this->article=Article::find($id);
        $this->title=$this->article->title;
        $this->image=$this->article->image;
        $this->tags=$this->article->tags;
        $this->slug=$this->article->slug;
        $this->category_id=$this->article->category_id;
        $this->description=$this->article->description;

    }
    public function updatingImage()
    {
        if (file_exists(public_path().'\\'.$this->image)){
            unlink(public_path().'\\'.$this->image);
        }
    }
    public function updatedImage()
    {
        $this->image = $this->UploadImage();
    }

    public function create()
    {
        $validated = Validator::make(
            ['slug' => $this->slug,'title'=>$this->title,'category_id'=>$this->category_id],
            ['slug' => 'required|unique:articles,slug,'.$this->article->id,'title'=>'required','category_id'=>'required'],
            ['slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.',
                'category_id.required' => 'فیلد دسته بندی الزامی می باشد.',
                'title.required' => 'فیلد عنوان الزامی می باشد.',
                'slug.required' => 'فیلد آدرس الزامی می باشد.',
            ],
        )->validate();

        $this->article->update([
            'title'=>$this->title,
            'slug'=>$this->slug,
            'tags'=>$this->tags,
            'description'=>$this->description,
            'image'=>$this->image,
            'category_id'=>$this->category_id,
        ]);
        return redirect()->route('article.list');
    }
    public function addTags()
    {
        $validator=Validator::make(
            ['option'=>$this->option],
            ['option'=>'required'],
            ['option.required' => 'پرکردن این فیلد اجباری می شود.'],

        )->validate();
        $this->tags[]=$this->option;
        $this->option='';
    }

    public function removeTags($id)
    {
        unset($this->tags[$id]);
    }
    public function updatedSlug()
    {
        $validated = Validator::make(
            ['slug' => $this->slug],
            ['slug' => 'required|unique:articles,slug'],
            ['slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.',],
        )->validate();
    }
    public function UploadImage()
    {
        $directory = 'articles/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function render()
    {
        return view('livewire.admin.articles.update');
    }
}
