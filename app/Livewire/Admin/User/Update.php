<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $name;
    public $city;
    public $avatar;
    public $role;
    public $option;
    public $national_code;
    public $birthday;
    public $job;
    public $email;
    public $user;
    public $address=[];
    public $password;
    protected $rules=[
        'name'=>'required',
        'email'=>'required',
        'national_code'=>'size:10',
    ];

    public function messages()
    {
        return [
            'name.required' => 'فیلد نام الزامی می باشد.',
            'role.required' => 'فیلد نام الزامی می باشد.',
            'password.required' => 'فیلد رمز عبور الزامی می باشد.',
            'email.required' => 'فیلد آدرس الزامی می باشد.',
            'national_code.size' => 'کدملی باید 10 رقمی باشد.',
            'password.size' => 'رمز باید حداقل 8 رقمی باشد.',
            'email.unique' => 'ایمیل از قبل انتخاب شده است لطفا ایمیل دگیری را وارد کنید.',
        ];
    }

    public function mount($id)
    {
        $this->user=User::find($id);
        $this->name=$this->user->name;
        $this->role=$this->user->role_id;
        $this->job=$this->user->job;
        $this->email=$this->user->email;
        $this->city=$this->user->city;
        $this->national_code=$this->user->national_code;
        $this->birthday=$this->user->birthday;
        $this->address=$this->user->address;
        $this->avatar=$this->user->avatar;
    }
    public function add_address()
    {
        if ($this->option){
            $this->address[] = $this->option;
            $this->option='';
        }
    }

    public function remove_address($id)
    {
        unset($this->address[$id]);
    }

    public function updatedAvatar()
    {
        if($this->avatar){
            $this->avatar = UploadImage($this->avatar,'user');
        }
    }
    public function create()
    {

        $this->validate();
        $this->user->update([
            'name'=>$this->name,
            'city'=>$this->city,
            'avatar'=>$this->avatar,
            'role_id'=>$this->role,
            'national_code'=>$this->national_code,
            'birthday'=>$this->birthday,
            'job'=>$this->job,
            'email'=>$this->email,
            'address'=>$this->address,
        ]);
        if ($this->password){
            $this->user->update([
                'password'=>$this->password,
            ]);
        }
        return redirect()->route('user.list');

    }
    public function render()
    {
        return view('livewire.admin.user.update');
    }
}
