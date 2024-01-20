<div>
    @section('title','برند')
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
                            <li class="breadcrumb-item active"> برند </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>برند  </strong> </h2>
                    </div>
                    <div class="body">
                        <form wire:submit="create" class="form-horizontal">
                            <div class="row clearfix">
                                <div class="mt-2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>نام برند</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="title" type="text"  class="form-control" placeholder="نام برند را وارد کنید">
                                        </div>
                                    </div>
                                    @error('title')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
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
                                        <label>دسته بندی</label>
                                        <div wire:ignore class="input-field col s12">
                                            <select wire:model.lazy="category_id">
                                                <option value=""  selected>گزینه خود را انتخاب کنید</option>
                                                @foreach(\App\Models\Category::pluck('title','id') as $key => $item)
                                                    <option value="{{$key}}">{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                            <p>{{$message}}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="email_address_2">لوگو</label>
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>فایل</span>
                                                <input wire:model.lazy="image" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        @if ($image)
                                            <img class="border-radius-per-15" width="200px" height="200px" src="{{ $image->temporaryUrl() }}">
                                        @endif
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
                                <th>لوگو</th>
                                <th>عنوان</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data as $item)
                                <tr>
                                    <th  scope="row">{{$counter}}</th>
                                    <td>
                                        <img class="border-radius-per-5" alt="{{$item->title}} " width="80px" height="80px" src="{{asset($item->logo)}}">
                                    </td>
                                    <td >{{$item->title}}</td>
                                    <td>
                                        @if($item->status)
                                            <span wire:click="status({{$item->id}},0)" class="label l-bg-cyan shadow-style pointer">فعال</span>
                                        @else
                                            <span wire:click="status({{$item->id}},1)" class="label l-bg-orange shadow-style pointer">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn tblActnBtn">
                                            <i class="material-icons"><a class="text-dark" href="{{route('brand.update',$item->id)}}">mode_edit</a></i>
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
                title: "وضعیت برند با موفقیت آپدیت شد",
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
