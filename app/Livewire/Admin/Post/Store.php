<?php

namespace App\Livewire\Admin\Post;

use App\Models\Posts;
use Livewire\Component;

class Store extends Component
{
    public $store;
    public $post;

    public function mount($id)
    {
        $this->post=Posts::find($id);
        $this->store=\App\Models\Store::where('post_id',$id)->first();
    }
    public function render()
    {
        return view('livewire.admin.post.store');
    }
}
