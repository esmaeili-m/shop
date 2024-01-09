<div>
    @section('title','تخفیف دسته بندی')
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
                            <li class="breadcrumb-item active"> تخفیف دسته بندی </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>درصد تخفیفات  </strong> دسته بندی {{$category->title}}</h2>

                    </div>
                    <div class="body">
                        <form wire:submit="create" class="form-horizontal">
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>قیمت تخفیف خورده به درصد</label>
                                        <div class="form-line">
                                            <input wire:model.lazy="percent" type="text"  class="form-control" placeholder="درصد تخفیف را وارد کنید">
                                        </div>
                                    </div>
                                    @error('percent')
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
        </div>
    </section>
</div>
