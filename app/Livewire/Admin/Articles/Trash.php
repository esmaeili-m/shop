<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function delete($id)
    {
        $item=Article::withTrashed()->find($id);
        if($item->image){
            if(fileExists(public_path('/').$item->image)){
                unlink(public_path('/').$item->image);
            }
        }
        $this->dispatch('item-delete',title:$item->title);
        $item->forceDelete();
    }

    public function undo($id)
    {
        $item=Article::withTrashed()->find($id);
        $this->dispatch('item-undo',title:$item->title);
        $item->restore();
    }
    public function render()
    {
        $data = Article::onlyTrashed()->where('title', 'LIKE', '%'.$this->search.'%')->with('category')->orderBy('id','desc')->paginate(8);

        return view('livewire.admin.articles.trash',compact('data'));
    }
}
