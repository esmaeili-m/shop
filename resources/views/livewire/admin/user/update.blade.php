<div>
    @section('title','افزودن کاربر')
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
                            <li class="breadcrumb-item active"> افزودن کاربر </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>افزودن </strong> کاربر</h2>
                    </div>
                    <div class="body">
                        <form wire:submit="create" class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label >نام</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="name" type="text"  class="form-control"
                                                   placeholder="نام کاربر را وارد کنید">
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>ایمیل</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="email" type="email"  class="form-control"
                                                   placeholder="ایمیل کاربر را وارد کنید">
                                        </div>
                                    </div>
                                    @error('email')
                                    <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                        <p>{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix mt-4">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="email_address_2">نقش کاربر</label>
                                        <div class="form-line">
                                            <div wire:ignore class="input-field col s12">
                                                <select wire:model.lazy="role">
                                                    <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                                    @foreach(\App\Models\Role::pluck('title','id') as $key => $role)
                                                        <option  value="{{$key}}">{{$role}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('role')
                                            <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                                <p>{{$message}}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>شهر</label>
                                            <div wire:ignore class="input-field col s12">
                                                <select wire:model.lazy="city">
                                                    <option value=""  selected>گزینه خود را انتخاب کنید</option>
                                                    @foreach(config('dashboard.city') as  $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>کد ملی</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="national_code" type="text"  class="form-control"
                                                   placeholder="کد ملی کاربر را وارد کنید">
                                        </div>
                                        @error('national_code')
                                        <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                            <p>{{$message}}</p>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row clearfix mt-4">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>شغل</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="job" type="text"  class="form-control"
                                                   placeholder="شغل کاربر را وارد کنید">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>تاریخ تولد</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="birthday" type="text" class="form-control"
                                                   placeholder="تاریخ تولد کاربر را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>رمز عبور</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="password" type="text"  class="form-control"
                                                   placeholder="رمز عبور کاربر را وارد کنید">
                                        </div>
                                        @error('password')
                                        <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                            <p>{{$message}}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix mr-3">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email_address_2">تصویر</label>
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>فایل</span>
                                            <input wire:model.lazy="avatar" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>آدرس</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="option" type="text"  class="form-control"
                                                   placeholder="آدرس های کاربر را وارد کنید">
                                        </div>
                                        <button type="button" wire:click="add_address" class="mt-2 btn btn-info">افزودن</button>
                                    </div>
                                    @foreach($address as $key => $value)
                                        <span class="badge badge-pill text-dark ml-2 mr-2 mt-4"><i wire:click="remove_address({{$key}})" class="fa fa-trash"></i> {{$value}}</span>
                                    @endforeach
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    @if ($avatar)
                                        <img class="border-radius-per-15" width="200px" height="200px" src="{{ asset($avatar) }}">
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
