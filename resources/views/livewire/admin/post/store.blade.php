<div>
    @section('title','انبار')
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
                            <li class="breadcrumb-item active"> انبار  </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>انبار- {{$post->title}} </strong> </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="info-box7 l-bg-green order-info-box7">
                                    <div class="info-box7-block">
                                        <h4 class="m-b-20">تعداد موجودی محصول</h4>
                                        <h2 class="text-right"><i class="fas fa-cart-plus pull-left"></i><span>{{$store->inventory ?? 0}}</span></h2>
                                        {{--                                    <p class="m-b-0">تعداد سفارش در این ماه: 14</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="info-box7 l-bg-orange order-info-box7">
                                    <div class="info-box7-block">
                                        <h4 class="m-b-20">تعداد باقی مانده</h4>
                                        <h2 class="text-right"><i class="fas fa-cart-plus pull-left"></i><span>{{$store->leftOver ?? 0}}</span></h2>
                                        {{--                                    <p class="m-b-0">تعداد سفارش در این ماه: 14</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="info-box7 l-bg-purple order-info-box7">
                                    <div class="info-box7-block">
                                        <h4 class="m-b-20">تعداد فروش</h4>
                                        <h2 class="text-right"><i class="fas fa-cart-plus pull-left"></i><span>{{$store->sold ?? 0}}</span></h2>
                                        {{--                                    <p class="m-b-0">تعداد سفارش در این ماه: 14</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="info-box7 l-bg-red order-info-box7">
                                    <div class="info-box7-block">
                                        <h4 class="m-b-20">تعداد علاقه مندی ها به این محصول</h4>
                                        <h2 class="text-right"><i class="fas fa-cart-plus pull-left"></i><span>{{$store->favorites ?? 0}}</span></h2>
                                        {{--                                    <p class="m-b-0">تعداد سفارش در این ماه: 14</p>--}}
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
        document.addEventListener('livewire:initialized', () => {
        @this.on('item-update-status', (event) => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "وضعیت انبار با موفقیت آپدیت شد",
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
