<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function status($id,$status)
    {
        Article::find($id)->update([
            'status'=>$status
        ]);
        $this->dispatch('item-update-status');
    }
    public function delete($id)
    {
        $item=Article::find($id);
        $this->dispatch('item-delete',title:$item->title);
        $item->delete();
    }
    public function render()
    {
        $data = Article::where('title', 'LIKE', '%'.$this->search.'%')
            ->with(['category'])->orderBy('id','desc')->paginate(8);

        return view('livewire.admin.articles.index',compact('data'));
    }
}
