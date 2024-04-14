<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <div class="sidebar-profile clearfix">
                    <div class="profile-img">
                        <img src="../../assets/images/usrbig.jpg" alt="profile">
                    </div>
                    <div class="profile-info">
                        <h3>حسین حیاتی</h3>
                        <p>خوش آمدید !</p>
                    </div>
                </div>
            </li>
            <li class="header">-- اصلی</li>
            <li class="">
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-home"></i>
                    <span>خانه</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../../index.html">داشبورد 1</a>
                    </li>
                    <li class="">
                        <a href="dashboard2.html">داشبورد 2</a>
                    </li>
                    <li>
                        <a href="dashboard3.html">داشبورد 3</a>
                    </li>
                </ul>
            </li>
            <li class="{{request()->routeIs('category.*') ? 'active' : ''}}">
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-menu-alt"></i>
                    <span> دسته بندی ها </span>
                </a>
                <ul class="ml-menu">
                    <li class="{{request()->routeIs('category.list') ? 'active' : ''}}">
                        <a href="{{route('category.list')}}">لیست دسته بندی ها</a>
                    </li>
                    <li class="{{request()->routeIs('category.create') ? 'active' : ''}}">
                        <a href="{{route('category.create')}}">ساخت دسته بندی جدید</a>
                    </li>

                </ul>
            </li>
            <li class="{{request()->routeIs('post.*') ? 'active' : ''}} {{request()->routeIs('brand.*') ? 'active' : ''}}">
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-shopping-cart-full"></i>
                    <span> فروشگاه </span>
                </a>
                <ul class="ml-menu">
                    <li class="{{request()->routeIs('post.list') ? 'active' : ''}}">
                        <a href="{{route('post.list')}}">لیست محصولات</a>
                    </li>
                    <li class="{{request()->routeIs('post.create') ? 'active' : ''}}">
                        <a href="{{route('post.create')}}">افزودن محصول جدید</a>
                    </li>
                    <li class="{{request()->routeIs('brand.list') ? 'active' : ''}}">
                        <a href="{{route('brand.list')}}">برندها</a>
                    </li>
                </ul>
            </li>
            <li class="{{request()->routeIs('article.*') ? 'active' : ''}}">
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-book "></i>
                    <span> مقالات </span>
                </a>
                <ul class="ml-menu">
                    <li class="{{request()->routeIs('article.list') ? 'active' : ''}}">
                        <a href="{{route('article.list')}}">لیست مقالات</a>
                    </li>
                    <li class="{{request()->routeIs('article.create') ? 'active' : ''}}">
                        <a href="{{route('article.create')}}">افزودن مقالات جدید</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('social.list')}}">
                    <i class="menu-icon ti-instagram"></i>
                    <span>سوشیال مدیا</span>
                </a>
            </li>
            <li class="{{request()->routeIs('user.*') ? 'active' : ''}}">
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-book "></i>
                    <span> کاربران </span>
                </a>
                <ul class="ml-menu">
                    <li class="{{request()->routeIs('user.list') ? 'active' : ''}}">
                        <a href="{{route('user.list')}}">لیست کاربران</a>
                    </li>
                    <li class="{{request()->routeIs('user.create') ? 'active' : ''}}">
                        <a href="{{route('user.create')}}">افزودن کاربر جدید</a>
                    </li>
                    <li class="{{request()->routeIs('user.create') ? 'active' : ''}}">
                        <a href="{{route('user.role')}}">نقش ها</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-shopping-cart-full"></i>
                    <span>فروشگاه</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../ecommerce/products.html">محصولات</a>
                    </li>
                    <li>
                        <a href="../ecommerce/product-detail.html">جزئیات محصول</a>
                    </li>
                    <li>
                        <a href="../ecommerce/cart.html">سبد خرید</a>
                    </li>
                    <li>
                        <a href="../ecommerce/product-list.html">فهرست محصول</a>
                    </li>
                    <li>
                        <a href="../ecommerce/invoice.html">صورت حساب</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-crown"></i>
                    <span>ابزارک ها</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../widgets/chart-widget.html">ابزارک نمودار</a>
                    </li>
                    <li>
                        <a href="../widgets/data-widget.html">ابزارک داده</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-magnet"></i>
                    <span>رابط کاربری</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../ui/alerts.html">هشدارها</a>
                    </li>
                    <li>
                        <a href="../ui/animations.html">انیمیشن ها</a>
                    </li>
                    <li>
                        <a href="../ui/badges.html">نشان ها</a>
                    </li>
                    <li>
                        <a href="../ui/modal.html">مودال</a>
                    </li>
                    <li>
                        <a href="../ui/buttons.html">دکمه ها</a>
                    </li>
                    <li>
                        <a href="../ui/collapse.html">سقوط</a>
                    </li>
                    <li>
                        <a href="../ui/dialogs.html">دیالوگ ها</a>
                    </li>
                    <li>
                        <a href="../ui/cards.html">کارت ها</a>
                    </li>
                    <li>
                        <a href="../ui/labels.html">برچسب ها</a>
                    </li>
                    <li>
                        <a href="../ui/list-group.html">گروه فرست</a>
                    </li>
                    <li>
                        <a href="../ui/media-object.html">شی رسانه</a>
                    </li>
                    <li>
                        <a href="../ui/notifications.html">اطلاعیه ها</a>
                    </li>
                    <li>
                        <a href="../ui/preloaders.html">پیش بارگذارها</a>
                    </li>
                    <li>
                        <a href="../ui/progressbars.html">نوارهای پیشرفت</a>
                    </li>
                    <li>
                        <a href="../ui/range-sliders.html">اسلایدرهای محدوده</a>
                    </li>
                    <li>
                        <a href="../ui/sortable-nestable.html">قابل مرتب شدن و ناپایداری</a>
                    </li>
                    <li>
                        <a href="../ui/tabs.html">زبانه ها</a>
                    </li>
                    <li>
                        <a href="../ui/waves.html">امواج</a>
                    </li>
                    <li>
                        <a href="../ui/typography.html">تایپوگرافی</a>
                    </li>
                    <li>
                        <a href="../ui/helper-classes.html">کلاس های کمکی</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-layout"></i>
                    <span>فرم ها</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../forms/basic-form-elements.html">فرم پایه</a>
                    </li>
                    <li>
                        <a href="../forms/advanced-form-elements.html">فرم پیشرفته</a>
                    </li>
                    <li>
                        <a href="../forms/form-examples.html">مثال های فرم</a>
                    </li>
                    <li>
                        <a href="../forms/form-validation.html">اعتبار سنجی فرم</a>
                    </li>
                    <li>
                        <a href="../forms/form-wizard.html">فرم جادویی</a>
                    </li>
                    <li>
                        <a href="../forms/editors.html">ویرایشگرها</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-menu-alt"></i>
                    <span>جداول</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../tables/normal-tables.html">جداول معمولی</a>
                    </li>
                    <li>
                        <a href="../tables/advance-tables.html">جداول داده پیشرفته</a>
                    </li>
                    <li>
                        <a href="../tables/export-table.html">جدول خروجی</a>
                    </li>
                    <li>
                        <a href="../tables/child-row-table.html">جدول ردیف کودک</a>
                    </li>
                    <li>
                        <a href="../tables/group-table.html">گروه بندی</a>
                    </li>
                    <li>
                        <a href="../tables/editable-table.html">جداول قابل ویرایش</a>
                    </li>
                </ul>
            </li>
            <li class="header">-- برنامه ها</li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-email"></i>
                    <span>ایمیل</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../email/inbox.html">صندوق ورودی</a>
                    </li>
                    <li>
                        <a href="../email/compose.html">نوشتن</a>
                    </li>
                    <li>
                        <a href="../email/view-mail.html">خواندن ایمیل</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../apps/chat.html">
                    <i class="menu-icon ti-comment"></i>
                    <span>چت</span>
                </a>
            </li>
            <li>
                <a href="../apps/calendar.html">
                    <i class="menu-icon ti-calendar"></i>
                    <span>تقویم</span>
                </a>
            </li>
            <li>
                <a href="../apps/task.html">
                    <i class="menu-icon ti-check-box"></i>
                    <span>نوار وظیفه</span>
                </a>
            </li>
            <li>
                <a href="../apps/portfolio.html">
                    <i class="menu-icon ti-briefcase"></i>
                    <span>نمونه کارها</span>
                </a>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-vector"></i>
                    <span>سایر</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../apps/dragdrop.html">کشیدن و رها کردن</a>
                    </li>
                    <li>
                        <a href="../apps/contact_list.html">فهرست تماس</a>
                    </li>
                    <li>
                        <a href="../apps/contact_grid.html">گرید تماس</a>
                    </li>
                    <li>
                        <a href="../apps/support.html">پشتیبانی</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-stats-up"></i>
                    <span>نمودارها</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../charts/amchart.html">نمودار AM</a>
                    </li>
                    <li>
                        <a href="../charts/echart.html">نمودار E</a>
                    </li>
                    <li>
                        <a href="../charts/apexcharts.html">نمودارهای Apex</a>
                    </li>
                    <li>
                        <a href="../charts/morris.html">موریس</a>
                    </li>
                    <li>
                        <a href="../charts/chartjs.html">نمودار JS</a>
                    </li>
                    <li>
                        <a href="../charts/sparkline.html">اسپارک لاین</a>
                    </li>
                    <li>
                        <a href="../charts/jquery-knob.html">جی کوئری Knoob</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-map-alt"></i>
                    <span>نقشه ها</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../maps/google.html">نقشه گوگل</a>
                    </li>
                    <li>
                        <a href="../maps/jqvmap.html">نقشه وکتور</a>
                    </li>
                    <li>
                        <a href="../maps/datamap.html">نقشه داده</a>
                    </li>
                </ul>
            </li>
            <li class="header">-- اضافی</li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-split-v"></i>
                    <span>خط زمانی</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../timeline/timeline.html">خط زمانی 1</a>
                    </li>
                    <li>
                        <a href="../timeline/timeline2.html">خط زمانی 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-image"></i>
                    <span>رسانهها</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../medias/image-gallery.html">گالری تصویر</a>
                    </li>
                    <li>
                        <a href="../medias/carousel.html">اسلایدر Carousel</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-user"></i>
                    <span>احراز هویت</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../examples/login-register.html">ورود و ثبت نام</a>
                    </li>
                    <li>
                        <a href="../examples/sign-in.html">ورود</a>
                    </li>
                    <li>
                        <a href="../examples/sign-up.html">ثبت نام</a>
                    </li>
                    <li>
                        <a href="../examples/forgot-password.html">فراموشی رمزعبور</a>
                    </li>
                    <li>
                        <a href="../examples/locked.html">قفل شده</a>
                    </li>
                    <li>
                        <a href="../examples/404.html">404 - یافت نشد</a>
                    </li>
                    <li>
                        <a href="../examples/500.html">500 - خطای سرور</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-receipt"></i>
                    <span>صفحات اضافی</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../examples/profile.html">پروفایل</a>
                    </li>
                    <li>
                        <a href="../examples/pricing.html">قیمت گذاری</a>
                    </li>
                    <li>
                        <a href="../examples/faqs.html">پرسش و پاسخ</a>
                    </li>
                    <li>
                        <a href="../examples/blank.html">صفحه خالی</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-angle-double-down"></i>
                    <span>منوی چندسطحی</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" onClick="return false;">
                            <span>آیتم منو</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onClick="return false;">
                            <span>آیتم منو - 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <span>سطح - 2</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" onClick="return false;">
                                    <span>آیتم منو</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onClick="return false;" class="menu-toggle">
                                    <span>سطح - 3</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span>سطح - 4</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <hr>
                <div class="leftSideProgress">
                    <div class="progress-list">
                        <div class="details">
                            <div class="title">استفاده از دیسک</div>
                        </div>
                        <div class="status">
                            <span>52</span>%
                        </div>
                        <div class="progress-s progress">
                            <div class="progress-bar progress-bar-success width-per-52" role="progressbar"
                                 aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leftSideProgress">
                    <div class="progress-list m-b-10">
                        <div class="details">
                            <div class="title">بارگذاری سرور</div>
                        </div>
                        <div class="status">
                            <span>79</span>%
                        </div>
                        <div class="progress-s progress">
                            <div class="progress-bar progress-bar-warning width-per-79" role="progressbar"
                                 aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation">
            <a href="#skins" data-toggle="tab" class="active">پوسته ها</a>
        </li>
        <li role="presentation">
            <a href="#settings" data-toggle="tab">تنظیمات</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
            <div class="demo-skin">
                <div class="rightSetting">
                    <p>تنظیمات عمومی</p>
                    <ul class="setting-list list-unstyled m-t-20">
                        <li>
                            <div class="form-check">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked> ذخیره تاریخچه
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked> نمایش وضعیت
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked> ثبت مسئله خودکار
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked> نمایش وضعیت به همه
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                    </label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="rightSetting">
                    <p>رنگ منو نوار کناری</p>
                    <button type="button" class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">روشن</button>
                    <button type="button" class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">تاریک</button>
                </div>
                <div class="rightSetting">
                    <p>رنگ قالب</p>
                    <button type="button" class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">روشن</button>
                    <button type="button" class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">تاریک</button>
                </div>
                <div class="rightSetting">
                    <p>پوسته ها</p>
                    <ul class="demo-choose-skin choose-theme list-unstyled">
                        <li data-theme="black" class="actived">
                            <div class="black-theme"></div>
                        </li>
                        <li data-theme="white">
                            <div class="white-theme white-theme-border"></div>
                        </li>
                        <li data-theme="purple">
                            <div class="purple-theme"></div>
                        </li>
                        <li data-theme="blue">
                            <div class="blue-theme"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan-theme"></div>
                        </li>
                        <li data-theme="green">
                            <div class="green-theme"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange-theme"></div>
                        </li>
                    </ul>
                </div>
                <div class="rightSetting">
                    <p>فضای دیسک</p>
                    <div class="sidebar-progress">
                        <div class="progress m-t-20">
                            <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar"
                                 aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-description">
                                    <small>26% باقی مانده</small>
                                </span>
                    </div>
                </div>
                <div class="rightSetting m-b-15">
                    <p>بارگذاری سرور</p>
                    <div class="sidebar-progress">
                        <div class="progress m-t-20">
                            <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar"
                                 aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-description">
                                    <small>بسیار بارگذاری شده</small>
                                </span>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane stretchRight" id="settings">
            <div class="demo-settings">
                <p>تنظیمات عمومی</p>
                <ul class="setting-list">
                    <li>
                        <span>گزارش استفاده از پانل</span>
                        <div class="switch">
                            <label>
                                <input type="checkbox" checked>
                                <span class="lever switch-col-green"></span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <span>تغییر مسیر ایمیل</span>
                        <div class="switch">
                            <label>
                                <input type="checkbox">
                                <span class="lever switch-col-blue"></span>
                            </label>
                        </div>
                    </li>
                </ul>
                <p>تنظیمات سیستم</p>
                <ul class="setting-list">
                    <li>
                        <span>اطلاعیه ها</span>
                        <div class="switch">
                            <label>
                                <input type="checkbox" checked>
                                <span class="lever switch-col-purple"></span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <span>به روز رسانی خودکار</span>
                        <div class="switch">
                            <label>
                                <input type="checkbox" checked>
                                <span class="lever switch-col-cyan"></span>
                            </label>
                        </div>
                    </li>
                </ul>
                <p>تنظیمات حساب</p>
                <ul class="setting-list">
                    <li>
                        <span>آنلاین</span>
                        <div class="switch">
                            <label>
                                <input type="checkbox" checked>
                                <span class="lever switch-col-red"></span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <span>مجوز محل سکونت</span>
                        <div class="switch">
                            <label>
                                <input type="checkbox">
                                <span class="lever switch-col-lime"></span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
