<div>
    @section('title','سوشیال مدیا')
    @push('style')
        <link href="{{asset('dashboard/assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />
        <link href="{{asset('dashboard/assets/js/bundles/multiselect/css/multi-select.css')}}" rel="stylesheet" />
    @endpush
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
                            <li class="breadcrumb-item active"> سوشیال مدیا </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>سوشیال مدیا  </strong> </h2>

                    </div>
                    <div class="body">
                        <form wire:submit="create" class="form-horizontal">
                            <div class="row clearfix">
                                <div class="mt-2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>لینک</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="link" type="text"  class="form-control" placeholder="لینک را وارد کنید">
                                        </div>
                                    </div>
                                    @error('link')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>عنوان</label>
                                        <div wire:ignore class="input-field col s12">
                                            <select wire:model.lazy="title">
                                                <option value=""  selected>گزینه خود را انتخاب کنید</option>
                                                <option value="Telegram">Telegram</option>
                                                <option value="Instagram">Instageram</option>
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="Behance">Behance</option>
                                                <option value="facebook">facebook</option>
                                                <option value="Pinterest">Pinterest</option>
                                                <option value="Email">Email</option>
                                                <option value="Twitter">Twitter</option>
                                                <option value="Youtube">Youtube</option>
                                                <option value="Eita">Eita</option>
                                                <option value="Phone">Phone</option>
                                                <option value="Address">Address`</option>
                                            </select>
                                        </div>
                                        @error('tag_type')
                                        <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                            <p>{{$message}}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="text-right col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class=" btn btn-primary m-t-15 waves-effect">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>لیست شبکه های اجتماعی</h2>

                    </div>
                    <div  class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>توضیحات</th>
                                <th>تگ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data as $item)
                                <tr>
                                    <th  scope="row">{{$counter}}</th>
                                    <td >{{$item->title}}</td>
                                    <td>{{$item->link}}</td>
                                    <td>
                                        @if($item->status)
                                            <span wire:click="status({{$item->id}},0)" class="label l-bg-cyan shadow-style pointer">فعال</span>
                                        @else
                                            <span wire:click="status({{$item->id}},1)" class="label l-bg-orange shadow-style pointer">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn tblActnBtn">
                                            <i class="material-icons"><a class="text-dark" href="{{route('social.update',$item->id)}}">mode_edit</a></i>
                                        </button>
                                        <button wire:click="delete({{$item->id}})" class="btn tblActnBtn">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    @php($counter++)
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        document.addEventListener('livewire:initialized', () => {
        @this.on('item-update-status', (event) => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "وضعیت سوشیال مدیا با موفقیت آپدیت شد",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2000,
                customClass: {
                    popup: 'my-swal-with',
                },
            });
        });
        @this.on('item-delete', (event) => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: 'آیتم '+event.title +' با موفقیت حذف شد ',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2000,
                customClass: {
                    popup: 'my-swal-with',
                },
            });
        });
        @this.on('item-create', (event) => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "آیتم با موفقیت آپدیت شد",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2000,
                customClass: {
                    popup: 'my-swal-with',
                },
            });
        });

        });
    </script>
    @push('scripts')
        <script src="{{asset('dashboard/assets/js/bundles/multiselect/js/jquery.multi-select.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

    @endpush

</div>
