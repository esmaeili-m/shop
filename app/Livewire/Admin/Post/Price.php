<?php

namespace App\Livewire\Admin\Post;

use App\Models\Posts;
use Livewire\Component;

class Price extends Component
{
    public $post;
    public $price;
    public $off;
    public $price_post;
    public $percent;
    public function mount($id)
    {
        $this->post=Posts::find($id);
        $this->price_post=\App\Models\Price::where('post_id',$id)->first();
        if ($this->price_post){
            $this->price=$this->price_post->price;
            $this->off=$this->price_post->off;
            $this->percent=$this->price_post->percent;
        }
    }
    protected $rules=[
        'price'=>'required',
    ];
    public function messages()
    {
        return [
            'price.required' => 'فیلد عنوان الزامی می باشد.',
            'required_without_all' => 'یکی از این دو فیلد باید پر شود.',
        ];
    }
    public function create()
    {
        $this->validate();
        if ($this->price_post){
            $this->price_post->update([
                'price'=>$this->price,
                'off'=>$this->off,
                'percent'=>$this->percent,
            ]);
        }else{
            \App\Models\Price::create([
                'price'=>$this->price,
                'off'=>$this->off,
                'percent'=>$this->percent,
                'post_id'=>$this->post->id
            ]);

        }
        return redirect()->route('post.list');
    }
    public function render()
    {
        return view('livewire.admin.post.price');
    }
}
