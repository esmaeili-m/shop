<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Price extends Component
{
    public $category;
    public $percent;
    public $price_category;

    public function mount($id)
    {
        $this->category=Category::find($id);
        $this->price_category=\App\Models\PriceCategory::where('category_id',$id)->first();
        if ($this->price_category){
            $this->percent=$this->price_category->percent;
        }
    }
    protected $rules=[
        'percent'=>'required',
    ];
    public function messages()
    {
        return [
            'percent.required' => 'فیلد عنوان الزامی می باشد.',
        ];
    }
    public function create()
    {
        $this->validate();
        if ($this->price_category){
            $this->price_category->update([
                'percent'=>$this->percent,
            ]);
        }else{
            \App\Models\PriceCategory::create([
                'percent'=>$this->percent,
                'category_id'=>$this->category->id
            ]);

        }
        return redirect()->route('category.list');
    }
    public function render()
    {
        return view('livewire.admin.categories.price');
    }
}
