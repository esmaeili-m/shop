<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name;
    public $city;
    public $avatar;
    public $role=1;
    public $option;
    public $national_code;
    public $birthday;
    public $job;
    public $email;
    public $address=[];
    public $password;
    protected $rules=[
        'name'=>'required',
        'password'=>'required|min:8',
        'email'=>'required|unique:users,email',
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
    public function create()
    {
        $this->validate();
        if($this->avatar){
            $this->avatar = UploadImage($this->avatar,'user');
        }
        $post=User::create([
            'name'=>$this->name,
            'city'=>$this->city,
            'avatar'=>$this->avatar,
            'role_id'=>$this->role,
            'national_code'=>$this->national_code,
            'birthday'=>$this->birthday,
            'job'=>$this->job,
            'email'=>$this->email,
            'address'=>$this->address,
            'password'=>$this->password,
        ]);
        return redirect()->route('user.list');

    }
    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
