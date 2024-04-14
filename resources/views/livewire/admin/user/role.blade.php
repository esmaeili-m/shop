<div>
    @section('title','نقش ها')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item 	bcrumb-1">
                                <a href="{{route('dashboard')}}">
                                    <i class="material-icons">home</i>
                                    خانه</a>
                            </li>
                            <li class="breadcrumb-item active"> نقش ها </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>لیست نقش ها</h2>
                    </div>
                    <livewire:admin.component.user.modal :title="$role" />
                    <div class="row">
                        <button  data-toggle="modal" data-target="#ModalCreateRole"
                                 class="col-xs-6 col-sm-6 col-md-2 col-lg-2  btn-hover btn-border-radius color-8">
                            <a class="text-white" href="#">افزودن نقش</a></button>
                        <button class="col-xs-6 col-sm-6 col-md-2 col-lg-2  btn-hover btn-border-radius color-8"><a class="text-white" href="{{route('category.trash')}}">سطل زباله (  {{\App\Models\Role::onlyTrashed()->count()}} )</a></button>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class=" form-line">
                                <label class="form-label">جستجو : </label>
                                <input  wire:model.live.debounce.500ms="search" type="text" class="form-control" name="search" placeholder="عنوان نقش را وارد کنید..." >
                            </div>
                        </div>
                    </div>
                    <div  class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نقش</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data ?? [] as $item)
                                <tr>
                                    <th  scope="row">{{$counter}}</th>
                                    <td >{{$item->title}}</td>
                                    <td>
                                        @if($item->status)
                                            <span wire:click="status({{$item->id}},0)" class="label l-bg-cyan shadow-style pointer">فعال</span>
                                        @else
                                            <span wire:click="status({{$item->id}},1)" class="label l-bg-orange shadow-style pointer">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="delete({{$item->id}})" class="btn tblActnBtn">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <button wire:click="set_role({{$item->id}})" class="btn tblActnBtn">
                                            <i class="material-icons"><a class="text-dark"
                                            data-toggle="modal" data-target="#ModalUpdateRole" >mode_edit</a></i>
                                        </button>
                                    </td>
                                    @php($counter++)
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            <div wire:ignore class="modal fade" id="ModalCreateRole" tabindex="-1" role="dialog"
                                 aria-labelledby="formModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formModal">افزودن نقش</h5>
                                            <button id="ModalCreateRoleClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form wire:submit="create">
                                                <label for="email_address1">نام نقش</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input wire:model.lazy="name" type="text"  class="form-control"
                                                               placeholder="نقش کاربر را وارد کنید">
                                                    </div>
                                                </div>
                                                <div class="alert alert-danger d-none rounded" id="errorMessagesCreate"></div>

                                                <div class="modal-footer ">
                                                    <button type="submit" class="btn btn-info waves-effect">ذخیره</button>
                                                    <button type="button" class="btn btn-danger waves-effect"
                                                            data-dismiss="modal">لغو</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('ModalCreateRole', (data) => {
                let ul = document.createElement('ul');
                ul.classList.add('mb-0')
                let errorMessages = document.getElementById('errorMessagesCreate');
                errorMessages.innerHTML="";
                for (let key in data[0]) {
                    if (data.hasOwnProperty(key)) {
                        let value = data[key];
                        let li = document.createElement('li');
                        li.textContent =value;
                        ul.appendChild(li);
                    }
                }
                errorMessages.appendChild(ul);
                errorMessages.classList.remove('d-none')
            });
            Livewire.on('closeModal', (data)=>{
                document.getElementById(data.type).click();
            })
        });
    </script>

</div>
