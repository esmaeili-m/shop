<div>
    @section('title','لیست محصولات')
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
                            <li class="breadcrumb-item active"> لیست محصولات </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>لیست محصولات</h2>
                            <div class="row">
                                <button class="col-xs-6 col-sm-6 col-md-2 col-lg-2  btn-hover btn-border-radius color-8"><a class="text-white" href="{{route('post.create')}}">افزودن محصول جدید</a></button>
                                <button class="col-xs-6 col-sm-6 col-md-2 col-lg-2  btn-hover btn-border-radius color-8"><a class="text-white" href="{{route('post.trash')}}">سطل زباله ({{\App\Models\Posts::onlyTrashed()->count()}})</a></button>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class=" form-line">
                                        <label class="form-label">جستجو : </label>
                                        <input  wire:model.live.debounce.500ms="search" type="text" class="form-control" name="search" placeholder="عنوان محصول و یا بارکد محصول  خود را وارد کنید..." >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>بارکد</th>
                                    <th>تصویر</th>
                                    <th>عنوان</th>
                                    <th>لینک</th>
                                    <th>دسته بندی ها</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($counter=1)
                                @foreach($data as $item)
                                    <tr>
                                        <th scope="row">{{$counter}}</th>
                                        <td>{{$item->barcode}}</td>
                                        <td>
                                            <img class="border-radius-per-5" alt="test " width="80px" height="80px" src="{{asset($item->image)}}">
                                        </td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->slug}}</td>
                                        <td><span  class="label bg-indigo  shadow-style pointer">{{$item->category->title ?? ''}}</span></td>
                                        <td>
                                            @if($item->status)
                                                <span wire:click="status({{$item->id}},0)" class="label l-bg-cyan shadow-style pointer">فعال</span>
                                            @else
                                                <span wire:click="status({{$item->id}},1)" class="label l-bg-orange shadow-style pointer">غیرفعال</span>
                                            @endif
                                        </td>

                                        <td>
                                            <button class="btn tblActnBtn">
                                                <i class="material-icons"><a class="text-dark" href="{{route('post.price',$item->id)}}">attach_money</a></i>
                                            </button>
                                            <button  class="btn tblActnBtn">
                                                <i class="material-icons"><a class="text-dark" href="{{route('post.attributes.index',$item->id)}}">featured_play_list</a></i>
                                            </button>
                                            <button class="btn tblActnBtn">
                                                <i class="material-icons"><a class="text-dark" href="{{route('post.update',$item->id)}}">mode_edit</a></i>
                                            </button>
                                            <button class="btn tblActnBtn">
                                                <i class="material-icons"><a class="text-dark" href="{{route('post.seo',$item->id)}}">queue_play_next</a></i>
                                            </button>
                                            <button class="btn tblActnBtn">
                                                <i class="material-icons"><a class="text-dark" href="{{route('store.list',$item->id)}}"> local_grocery_store</a></i>
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
                        {{ $data->links() }}

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
                    title: "وضعیت محصول با موفقیت آپدیت شد",
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
                    title: 'محصول '+event.title +' با موفقیت حذف شد ',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000,
                    customClass: {
                        popup: 'my-swal-with',
                    },
                });
            });
            @this.on('item-price', (event) => {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: 'قیمت محصول '+event.title +' با موفقیت ثبت شد ',
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
</div>
