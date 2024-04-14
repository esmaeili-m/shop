<?php

namespace App\Livewire\Admin\Component\User;

use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Modal extends Component
{
    public $role;
    #[Validate('required', message: 'فیلد عنوان الزامی می باشد')]
    public $title;
    protected $listeners = ['eventName' => 'methodName','refreshParent'=>'$refresh'];

    public function methodName($id)
    {
        $this->dispatch('errorHandlingclose',type:'errorMessages');
        $this->role=Role::find($id);
        $this->title=$this->role->title;
    }
    public function save()
    {
        try {
            $this->validate();
            $this->role->update([
               'title'=>$this->title
            ]);
            $this->dispatch('alert',message:" نام نقش با موفقیت بروز رسانی شد",icon:'success');
            $this->dispatch('closeModal',type:'ModalUpdateRoleClose');
            $this->dispatch('refreshParent');
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->messages())->flatten();
            $this->dispatch('errorHandling', $errors);

        }
    }
    public function render()
    {
        return view('livewire.admin.component.user.modal');
    }
}
