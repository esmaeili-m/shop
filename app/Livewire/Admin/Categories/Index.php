<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\fileExists;

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
//        if($category->image){
//            if(fileExists(public_path('/').$category->image)){
//                unlink(public_path('/').$category->image);
//            }
//        }
        $this->dispatch('category-delete',title:$category->title);
        $category->delete();
    }
    public function render()
    {
        $data = Category::where('title', 'LIKE', '%'.$this->search.'%')->with('parent')->orderBy('id','desc')->paginate(8);
        return view('livewire.admin.categories.index',compact('data'));
    }
}
