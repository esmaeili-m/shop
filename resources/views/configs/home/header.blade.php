<nav id="menu-wrap" class="menu-back cbp-af-header menu-have-back-color">
    <div class="parallax-1" ></div>
    <div class="dark-over"></div>
    <div class="menu-container">
        <div class="logo"><img src="{{asset('/home')}}/images/logo-light.png" alt=""/></div>
        <div  class="menu">

            <ul class="rtl-menu persian">
                <li>
                    <a href="#"  class="curent-multi-page">صفحه اصلی</a>
                </li>
                <li >
                    <a href="#">دسته بندی ها</a>
                    <ul style="border-radius: 10px;border:1px solid #065fb9"
                        class="persion-subcategory">
                        @foreach(\App\Models\Category::whereNull('parent_id')->with('descendants')->get() as $item)
                            <li>
                                <p>{{$item->title}}</p>
                                <ul class="">
                                    @foreach($item->descendants as $child)
                                        <li>
                                            <a href="mas-two-col.html">{{$child->title}}</a>
                                        </li>
                                        @foreach($child->descendants ?? [] as $subchild)
                                            <li>
                                                <a href="mas-two-col.html">{{$subchild->title}}</a>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="contact.html">شگفت انگیز ها</a></li>
                <li><a href="contact.html">پرفروش ترین ها</a></li>
                <li><a href="contact.html">تخفیف و پیشنهادها</a></li>
                <li><a href="contact.html">درباره ما</a></li>
                <li><a href="contact.html">ارتباط با ما</a></li>
                @foreach(\App\Models\SocialMedia::get() as $item)
                    <li class="social-mobile">
                        <a href="{{$item->link}}" class="social first-icon fa-{{strtolower($item->title)}} tipped" data-title="twitter"
                                                 data-tipper-options='{"direction":"bottom","follow":"true","margin":5}'>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav><!-- END MENU==================================================-->
