<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function status($id,$status)
    {
        Category::find($id)->update([
           'status'=>$status
        ]);
        $this->dispatch('category-update-status');
    }

    public function delete($id)
    {
        $category=Category::find($id);
        $this->dispatch('category-delete',title:$category->title);
        $category->delete();
    }
    public function render()
    {
        $data = Category::where('title', 'LIKE', '%'.$this->search.'%')->with('parent')->paginate(5);
        return view('livewire.admin.categories.index',compact('data'));
    }
}
