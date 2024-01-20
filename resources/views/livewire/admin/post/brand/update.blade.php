<div>
    @section('title','ویرایش برند')
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
                            <li class="breadcrumb-item active"> ویرایش برند </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ویرایش برند
                            -
                            {{$brand->title}}
                        </h2>
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
                                        <img class="border-radius-per-15" width="200px" height="200px" src="{{ asset($image) }}">
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
        </div>
    </section>
    @push('scripts')
        <script src="{{asset('dashboard/assets/js/bundles/multiselect/js/jquery.multi-select.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

    @endpush
</div>
