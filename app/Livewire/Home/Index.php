<?php

namespace App\Livewire\Home;

use App\Models\Posts;
use Livewire\Component;

class Index extends Component
{
    public $category;
    public function set_category($id = null){
        $this->category=$id;
    }
    public function getPostsProperty()
    {
        $query=Posts::query();
        if ($this->category){
            $query->where('category_id',$this->category);
        }
        return $query->with(['category'])->paginate(10);
    }
    public function render()
    {
        $query=Posts::query();
        if ($this->category){
            $query->where('category_id',$this->category);
        }
        $posts=$query->paginate(10);
        return view('livewire.home.index',compact('posts'))->layout('layouts.home');
    }
}
