<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{$appSetting->page_title ?? 'Page title'}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        {{$appSetting->meta_description ?? 'Description here'}}
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="" class="text-white">Map</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$appSetting->address ?? 'Address here'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> +855 {{$appSetting->phone_one ?? $appSetting->phone_two ?? '123456789'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{$appSetting->email_one ?? $appSetting->email_two ?? 'info@gmail.com'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; {{date('Y')}}  KH -Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        <span class="text-white">Get Connected:</span>
                        @if ($appSetting->facebook)
                            <a href="{{$appSetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                            <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                            @if ($appSetting->instagram)
                        <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                            <a href="{{$appSetting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                        @if ($appSetting->telegram)
                            <a href="{{$appSetting->telegram}}" target="_blank"><i class="fa fa-telegram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
