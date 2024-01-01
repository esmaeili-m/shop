<?php

namespace App\Livewire\Admin\Post;

use App\Models\Posts;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function delete($id)
    {
        $item=Posts::withTrashed()->find($id);
//        if($item->image){
//            if(fileExists(public_path('/').$item->image)){
//                unlink(public_path('/').$item->image);
//            }
//        }
        $this->dispatch('item-delete',title:$item->title);
        $item->forceDelete();
    }

    public function undo($id)
    {
        $item=Posts::withTrashed()->find($id);
        $this->dispatch('item-undo',title:$item->title);
        $item->restore();
    }
    public function render()
    {
        $data = Posts::onlyTrashed()->where('title', 'LIKE', '%'.$this->search.'%')->with('categories')->orderBy('id','desc')->paginate(8);
        return view('livewire.admin.post.trash',compact('data'));
    }
}
