<?php

namespace App\Livewire\Admin\Post;

use App\Models\AttributesCategory;
use App\Models\AttributesPosts;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

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
        'slug'=>'required|unique:posts,slug',
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
        $code=Posts::max('barcode');
        $order=Posts::max('order');
        if ($code){
            $barcode=$code+1;
        }else{
            $barcode=10000;
        }
        if ($order){
            $order=$order+1;
        }else{
            $order=1;
        }
        $post=Posts::create([
           'title'=>$this->title,
           'slug'=>$this->slug,
           'description'=>$this->description,
           'image'=>$this->image,
           'category_id'=>$this->category_id,
           'brand_id'=>$this->brand,
           'barcode'=>$barcode,
           'order'=>$order,
        ]);
        if ($this->input){
            foreach ($this->input as $key => $i){
                AttributesPosts::create([
                    'post_id'=>$post->id,
                    'value'=>$i,
                    'title'=>$this->attributesCategory->where('id',$key)->first()['title']
                ]);
            }
        }
        return redirect()->route('post.list');

    }
    public function UploadImage()
    {
        $directory = 'posts/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function addTags(){
        $validated = Validator::make(
            ['tagOption' => $this->tagOption],
            ['tagOption' => 'required'],
            ['tagOption.required' => 'پرکردن این فیلد اجباری می شود.'],

        )->validate();
        $this->tags[]=$this->tagOption;
        $this->tagOption='';
    }

    public function updatedCategoryId()
    {
        $this->attributesCategory=AttributesCategory::where('category_id',$this->category_id)->get();

    }
    public function removeTags($id){
        unset($this->tags[$id]);
    }
    public function render()
    {
//        dd($this->attributesCategory);
        return view('livewire.admin.post.create');
    }
}
