<div>
    @section('title','ساخت دسته بندی')
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
                            <li class="breadcrumb-item active"> ساخت دسته بندی </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <strong>دسته بندی</strong> ساخت</h2>
            </div>
            <div class="body">
                <form wire:submit="create" class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">عنوان</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input wire:model.lazy="title" type="text"  class="form-control" placeholder="عنوان دسته خود را وارد کنید">
                                </div>
                            </div>

                        </div>
                        <div class="col-2"></div>
                        @error('title')
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="ml-1 alert alert-danger border-radius-per-6">
                                <p>{{$message}}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">آدرس</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input wire:model.lazy="slug" type="text"  class="form-control" placeholder="آدرس دسته را وارد کنید">
                                </div>
                            </div>

                        </div>
                        <div class="col-2"></div>
                        @error('slug')
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="ml-1 alert alert-danger border-radius-per-6">
                                <p>{{$message}}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label >دسته والد</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div wire:ignore class="input-field col s12">
                                <select wire:model.lazy="parent_id">
                                    <option value=""  selected>گزینه خود را انتخاب کنید</option>
                                    @foreach(\App\Models\Category::whereNull('parent_id')->pluck('title','id') as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">توضیحات</label>
                        </div>
                        <div wire:ignore class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                 <textarea  placeholder="توضیحات دسته را وارد کنید">

                                </textarea>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">تصویر</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
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
                        <div class="col-2"></div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 ">
                            @if ($image)
                                <img class="border-radius-per-15" width="200px" height="200px" src="{{ $image->temporaryUrl() }}">
                            @endif
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <input type="checkbox" id="remember_me_4" class="filled-in">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت</button>
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
