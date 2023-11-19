<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function delete($id)
    {
        $category=Category::withTrashed()->find($id);
        if($category->image){
            if(fileExists(public_path('/').$category->image)){
                unlink(public_path('/').$category->image);
            }
        }
        $this->dispatch('category-delete',title:$category->title);
        $category->forceDelete();
    }

    public function undo($id)
    {
        $category=Category::withTrashed()->find($id);
        $this->dispatch('category-undo',title:$category->title);
        $category->restore();
    }
    public function render()
    {
        $data = Category::onlyTrashed()->where('title', 'LIKE', '%'.$this->search.'%')->with('parent')->orderBy('id','desc')->paginate(8);
        return view('livewire.admin.categories.trash',compact('data'));
    }
}
