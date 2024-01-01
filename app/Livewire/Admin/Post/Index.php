<?php

namespace App\Livewire\Admin\Post;

use App\Models\CategoryPost;
use App\Models\Posts;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function status($id,$status)
    {
        Posts::find($id)->update([
            'status'=>$status
        ]);
        $this->dispatch('item-update-status');
    }

    public function delete($id)
    {
        $item=Posts::find($id);
        $this->dispatch('item-delete',title:$item->title);
        $item->delete();
    }
    public function render()
    {
        $data = Posts::where('title', 'LIKE', '%'.$this->search.'%')->orwhere('barcode', 'LIKE', '%'.$this->search.'%')->with(['category'])->orderBy('id','desc')->paginate(8);
        return view('livewire.admin.post.index',compact('data'));
    }
}
