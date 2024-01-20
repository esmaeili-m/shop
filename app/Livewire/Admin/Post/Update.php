<?php

namespace App\Livewire\Admin\Post;

use App\Models\AttributesCategory;
use App\Models\AttributesPosts;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Laravel\Prompts\alert;

class Update extends Component
{
    public $post;
    public $image;
    public $title;
    public $slug;
    public $store;
    public $input=[];
    public $attributesCategory;
    public $category_id;
    public $brand;
    public $inventory;
    public $description;
    public $old_image;
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
         $this->post=Posts::find($id);
         $this->store=\App\Models\Store::where('post_id',$id)->first();
         $this->title=$this->post->title;
         $this->inventory= $this->store->inventory;
         $this->image=$this->post->image;
         $this->slug=$this->post->slug;
         $this->category_id=$this->post->category_id;
         $this->brand=$this->post->brand_id;
         $this->description=$this->post->description;
         $attributesPost=AttributesPosts::where('post_id',$id)->get();
         $this->attributesCategory=AttributesCategory::where('category_id',$this->category_id)->get();
         foreach ($this->attributesCategory as $item){
             $check=$attributesPost->where('title',$item->title)->first();
             if ($check){
                $this->input[$item->id]=$attributesPost->where('title',$item->title)->first()['value'];
             }
         }
    }
    public function updatedCategoryId()
    {
        $this->input=[];
        $attributesPost=AttributesPosts::where('post_id', $this->post->id)->get();
        $this->attributesCategory=AttributesCategory::where('category_id',$this->category_id)->get();
        foreach ($this->attributesCategory as $item){
            $check=$attributesPost->where('title',$item->title)->first();
            if ($check){
                $this->input[$item->id]=$attributesPost->where('title',$item->title)->first()['value'];
            }
        }
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

    public function create()
    {
        $validated = Validator::make(
            ['slug' => $this->slug,'title'=>$this->title,'category_id'=>$this->category_id,'inventory'=>$this->inventory],
            ['slug' => 'required|unique:posts,slug,'.$this->post->id,'title'=>'required','category_id'=>'required','inventory'=>'required'],
            ['slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.',
             'category_id.required' => 'فیلد دسته بندی الزامی می باشد.',
             'title.required' => 'فیلد عنوان الزامی می باشد.',
             'inventory.required' => 'فیلد موجودی الزامی می باشد.',
             'slug.required' => 'فیلد آدرس الزامی می باشد.',
                ],
        )->validate();

        $this->post->update([
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'image'=>$this->image,
            'category_id'=>$this->category_id,
            'brand_id'=>$this->brand,
        ]);
        $this->store->update([
            'inventory'=>$this->inventory,
            'leftOver'=>$this->inventory-($this->store->sold+$this->store->favorites)
        ]);
        if ($this->input){
            AttributesPosts::where('post_id',$this->post->id)->delete();
            foreach (array_filter($this->input) ?? [] as $key => $i){
                if ($this->attributesCategory->whereIn('id',$key)->first()){
                    AttributesPosts::create([
                        'post_id'=>$this->post->id,
                        'value'=>$i,
                        'title'=>$this->attributesCategory->where('id',$key)->first()['title']
                    ]);
                }

            }
        }
        if($this->old_image){
            unlink($this->old_image);
        }
        return redirect()->route('post.list');
    }
    public function updatedSlug()
    {
        $validated = Validator::make(
            ['slug' => $this->slug],
            ['slug' => 'required|unique:posts,slug'],
            ['slug.unique' => 'آدرس وارد شده از قبل انتخاب شده است لطفا آدرس دیگری را وارد کنید.',],
        )->validate();
    }
    public function UploadImage()
    {
        $directory = 'posts/'. time();
        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs($directory .'/',$imageName,'public_path');
        return 'uploads/'.$directory.'/'.$imageName;
    }
    public function render()
    {
        return view('livewire.admin.post.update');
    }
}
