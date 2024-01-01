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
                            <li class="breadcrumb-item active"> لیست ویژگی ها </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <form wire:submit="save">
                                <div class="row">
                                    <div class="mt-3 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label > عنوان ویژگی</label>
                                            <div class="form-line">
                                                <input wire:model.lazy="title" type="text"  class="form-control" placeholder="عنوان وِیژگی را وارد کنید">
                                            </div>
                                            @error('title')
                                            <div class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                                <p>{{$message}}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="mt-5 col-xs-6 col-sm-6 col-md-2 col-lg-2  btn-hover btn-border-radius color-8">
                                        افزودن ویژگی </button>


                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>لیست ویژکی ها</h2>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class=" form-line">
                                        <label class="form-label">جستجو : </label>
                                        <input  wire:model.live.debounce.500ms="search" type="text" class="form-control" name="search" placeholder="عنوان ویژگی خود را وارد کنید..." >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان ویژگی</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($counter=1)
                                @foreach($data ?? [] as $item)
                                    <tr>
                                        <th scope="row">{{$counter}}</th>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            <button wire:click="updateData({{$item->id}})" class="btn tblActnBtn">
                                                <i class="material-icons"><a class="text-dark" data-toggle="modal" data-target="#exampleModal">mode_edit</a></i>
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
                        <div wire:ignore class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="formModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModal">عنوان مودال</h5>
                                        <button id="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit="update">
                                            <label for="email_address1">عنوان ویژگی</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input wire:model.lazy="new_title" type="text" id="new_title" class="form-control"
                                                           placeholder="عنوان وِیژگی را وارد کنید">
                                                </div>
                                                <div id="error_div_title" style="display: none"  class="mt-1 ml-1 alert alert-danger border-radius-per-6">
                                                    <p id="error_title"></p>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">ویرایش</button>
                                        </form>
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
        @this.on('set-data', (event) => {
            document.getElementById('new_title').value=event.title;
        });
        @this.on('errortitle', (event) => {
            document.getElementById('error_div_title').style.display='';
            document.getElementById('error_title').innerText=event.title;
        });

        @this.on('errorall', (event) => {
            document.getElementById('error_div_title').style.display='';
            document.getElementById('error_title').innerText=event.title;
        });
        @this.on('update_attributes', (event) => {
            document.getElementById('close').click();
            document.getElementById('error_div_title').style.display='none';
            document.getElementById('error_title').innerText='';
            Swal.fire({
                position: "center",
                icon: "success",
                title: 'محصول '+event.title +' با موفقیت آپدیت شد ',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2000,
                customClass: {
                    popup: 'my-swal-with',
                },
            });
        });
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
        @this.on('item-create', (event) => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "ویژگی جدید اضافه شد",
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
        });
    </script>
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
