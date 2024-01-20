<div>
    @section('title','ویرایش دسته بندی')
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
                            <li class="breadcrumb-item active"> ویرایش محصول </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ویرایش محصول
                            -
                            {{$post->title}}
                        </h2>
                    </div>
                    <div class="body">
                        <form wire:submit="create" class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label >عنوان</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="title" type="text"  class="form-control" placeholder="عنوان دسته خود را وارد کنید">
                                        </div>
                                    </div>
                                    @error('title')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>آدرس</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="slug" type="text"  class="form-control" placeholder="آدرس محصول را وارد کنید">
                                        </div>
                                    </div>
                                    @error('slug')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix mt-4">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="email_address_2">دسته بندی محصول</label>
                                        <div class="form-line">
                                            <div wire:ignore class="input-field col s12">
                                                <select wire:model.lazy="category_id">
                                                    <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                                    @foreach(\App\Models\Category::all() as $categoryItem)
                                                        <option  value="{{$categoryItem['id']}}">{{$categoryItem['title']}}</option>
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
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>برند</label>
                                            <div wire:ignore class="input-field col s12">
                                                <select wire:model.lazy="brand">
                                                    <option value=""  selected>گزینه خود را انتخاب کنید</option>
                                                    @foreach(\App\Models\Brands::all() as  $value)
                                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>تعداد موجودی</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="inventory" type="number"  class="form-control" placeholder="موجودی محصول را وارد کنید">
                                        </div>
                                    </div>
                                    @error('inventory')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row clearfix mt-4">
                                @foreach($attributesCategory ?? [] as $key => $value)
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >{{$value->title}}</label>
                                            <div class="form-line">
                                                <input wire:model.defer="input.{{$value->id}}" type="text"  class="form-control" placeholder="پاسخ خود را وارد کنید">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row clearfix mr-2">
                                <div wire:ignore class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email_address_2">توضیحات</label>
                                    <textarea  placeholder="توضیحات محصول را وارد کنید">{{$description}}</textarea>
                                </div>
                            </div>
                            <div class="row clearfix mr-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email_address_2">تصویر</label>
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
                                <div class="text-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button type="submit" class=" btn btn-primary m-t-15 waves-effect">ثبت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{asset('dashboard/assets/js/tinymce.min.js')}}"></script>
        <script>
            tinymce.init({
                language:'fa',
                selector: 'textarea',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link   table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                setup: (editor) => {
                    editor.on("change", (e) => {
                    @this.set("description",editor.getContent());
                    });
                },
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });

        </script>
        <script src="{{asset('dashboard/assets/js/bundles/multiselect/js/jquery.multi-select.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

    @endpush
</div>
