<?php

namespace App\Livewire\Admin\User;

use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Role extends Component
{
    #[Validate('required', message: 'فیلد عنوان الزامی می باشد')]
    public $name;
    public $search;
    public $role;
    protected $listeners = ['refreshParent' => '$refresh'];
    public function set_role($id)
    {
        $this->dispatch('eventName', $id);
    }
    public function create()
    {
        try {
            $this->validate();
            \App\Models\Role::create([
                'title'=>$this->name,
            ]);
            $this->dispatch('alert',message:" نقش با موفقیت ساخته شد",icon:'success');
            $this->dispatch('closeModal',type:'ModalCreateRoleClose');
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->messages())->flatten();
            $this->dispatch('ModalCreateRole', $errors);
        }
        $this->name='';
        $this->dispatch('create',message:'نقش '.$this->name.'با موفقیت ایجاد شد');
    }

    public function delete($id)
    {
        $item=\App\Models\Role::find($id);
        $this->dispatch('alert',message:'نقش با موفقیت حذف شد',icon:'success');
        $item->delete();
    }
    public function status($id,$status)
    {
        \App\Models\Role::find($id)->update([
            'status'=>$status
        ]);
        $this->dispatch('alert',message:" وضعیت نقش آپدیت شد.",icon:'success');
    }
    public function render()
    {
        $data=\App\Models\Role::where('title','LIKE','%'.$this->search.'%')->get();
        return view('livewire.admin.user.role',compact('data'));
    }
}
