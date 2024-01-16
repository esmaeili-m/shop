<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $image;
    public $option;
    public $tags=[];
    public $title;
    public $slug;
    public $input=[];
    public $category_id;
    public $description;
    use WithFileUploads;
    protected $rules=[
        'title'=>'required',
        'category_id'=>'required',
        'slug'=>'required|unique:Articles,slug',
    ];
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان الزامی می باشد.',
            'slug.required' => 'فیلد آدرس الزامی می باشد.',
            'category_id.required' => 'فیلد دسته بندی الزامی می باشد.',
            'slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.',
        ];
    }

    public function create()
    {
        $this->validate();
        if($this->image){
            $this->image = $this->UploadImage();
        }
        $order=Article::max('order');

        if ($order){
            $order=$order+1;
        }else{
            $order=1;
        }
        $article=Article::create([
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'image'=>$this->image,
            'tags'=>$this->tags,
            'category_id'=>$this->category_id,
            'order'=>$order,
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
    public function UploadImage()
    {
        $directory = 'Article/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function render()
    {
        return view('livewire.admin.articles.create');
    }
}
