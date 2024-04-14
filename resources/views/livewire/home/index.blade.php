<div>
    <div class="section big-height" id="home">
        <div class="parallax-1" style="background-image: url('{{asset('/home')}}/assets/young-beautiful-woman-business-suit.jpg')"></div>
        <div class="dark-over"></div>
        <div class="home-text-wrap fade-elements"><h1>arek kampung</h1>
            <p><span>branding · illustration · design</span></p></div>
    </div>
{{--    @php($cat=\App\Models\Category::whereNull('parent_id')->with('descendants')->get()[20]->toArray())--}}
{{--    @dd($cat)--}}
    <div class="section back-dark2">
        <div class="section">
            <div class="clear"></div>
            <div class="section">
                <div id="portfolio-filter" class="portfolio-filter">
                    <ul id="filter">
                        <li><a  wire:click="set_category({{null}})" href="#" class="{{$category == null ?'current':''}}" >all</a></li>
                        @foreach(\App\Models\Category::where('status',1)->whereNull('parent_id')->pluck('title','id') as $key => $item)
                            <li class="tipped">
                                <a style="cursor: pointer" wire:click="set_category({{$key}})"
                                   class="{{$category == $key ?'current':''}}" title="">{{$item}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div >
                    @foreach($posts as $post)
                        <div class="portfolio-box-1 video">
                            <div class="mask"></div>
                            <img src="{{asset($post->image)}}" alt="">
                            <div class="product-det persian"><h4>$32</h4><h6 style="font-family: IranSanse">{{$post->title}}</h6>
                                <div class="product-links"><a href="product.html">view</a><a href="checkout.html">buy</a></div>
                            </div>
                        </div>
{{--                        <a href="project.html">--}}
{{--                            <div class="portfolio-box-1 ">--}}
{{--                                <div class="mask"></div>--}}
{{--                                <h3>--}}
{{--                                    <span>{{$post->category->title}}</span>--}}
{{--                                    <br>{{$post->title}}--}}
{{--                                </h3>--}}
{{--                                <img src="{{asset($post->image)}}" alt="">--}}
{{--                            </div>--}}
{{--                        </a>--}}
                    @endforeach
                </div>
            </div>
        </div>
{{--        <div class="section back-black padding-top-bottom-small">--}}
{{--            <div class="container z-bigger">--}}
{{--                <div class="twelve columns">--}}
{{--                    <div id="owl-logos" class="owl-carousel owl-theme">--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white1.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white2.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white3.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white4.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white5.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white6.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white1.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white2.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white3.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white4.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white5.png" alt=""/></div>--}}
{{--                        <div class="item"><img src="{{asset('/home')}}/images/logos/white6.png" alt=""/></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
