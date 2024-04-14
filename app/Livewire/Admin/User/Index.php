<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $search='';
    public function status($id,$status)
    {
        User::find($id)->update([
            'status'=>$status
        ]);
        $this->dispatch('alert',message:" وضعیت کاربر آپدیت شد.",icon:'success');
    }
    public function render()
    {
        $data=User::with('role')->where(function ($uqery){
            $uqery->where('name','LIKE','%'.$this->search.'%')->orWhere('email','LIKE','%'.$this->search.'%');
        })->paginate(10);
        return view('livewire.admin.user.index',compact('data'));
    }
}
