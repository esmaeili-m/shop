<div>
    @section('title','سئو دسته بندی')
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
                            <li class="breadcrumb-item active"> تگ های سئو </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>تگ های سئو  </strong> دسته بندی {{$category->title}}</h2>

                    </div>
                    <div class="body">
                        <form wire:submit="create" class="form-horizontal">
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>محتوا</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="content" type="text"  class="form-control" placeholder="محتوای تگ را وارد کنید">
                                        </div>
                                    </div>
                                    @error('content')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                        <label>تگ</label>
                                        <div wire:ignore class="input-field col s12">
                                            <select wire:model.lazy="tag_type">
                                                <option value=""  selected>گزینه خود را انتخاب کنید</option>
                                                    <option value="title">Title</option>
                                                    <option value="description">Description</option>
                                                    <option value="robots">Robots</option>
                                                    <option value="canonical ">Canonical</option>
                                                    <option value="og:title">og:title</option>
                                                    <option value="og:desscription">og:desscription</option>
                                            </select>
                                        </div>
                                    @error('tag_type')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
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
                        <h2>لیست تگ های  دسته بندی {{$this->category->title}}</h2>

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
                                    <td >{{$item->content}}</td>
                                    <td>{{$item->tag_type}}</td>
                                    <td>
                                        <button class="btn tblActnBtn">
                                            <i class="material-icons"><a class="text-dark" href="{{route('category.seo.update',$item->id)}}">mode_edit</a></i>
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
        @this.on('item-delete', (event) => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: 'تگ '+event.title +' با موفقیت حذف شد ',
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
                title: "تگ با موفقیت آپدیت شد",
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
