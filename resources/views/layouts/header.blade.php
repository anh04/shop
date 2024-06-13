
<header class="grid items-center">
    <topbar id="topbar"> </topbar>
    <headerbar id="headerbar">
        <div class="container">
            <div class="row h-100 justify-content-md-center justify-content-sm-start align-items-center media-flex">
                <div class="col-md-2 col-lg-2 col-sm-7 media-xs-7 force-hidden">
                    <img class="w-167" src="{{ URL::to('/') }}/assets/images/logo_1.png" >
                </div>
                <div class="col-md-7 col-lg-4 col-sm-1 block-search media-xs-1 ">
                    <input class="form-control me-2 bg-color3 media-search text-search" type="search" placeholder="Search" aria-label="Search">
                    <i class="fab fa-sistrix icon-search"></i>
                    <i class="fa-solid fa-angle-up fa-rotate-270 icon-back media-is-hidden hidden-force" style="cursor:pointer"></i>
                </div>
                <div class="col-md-1 col-lg-2 col-sm-1 media-xs-1 force-hidden">
                    <div class="row justify-content-center align-items-center  show-modal-login" style="cursor:pointer">
                        @if (Auth::user())
                        <div class="col-md-12 col-lg-3 tooltip-media" style="cursor: pointer">
                            <div class="box-size-2 bg-color3 " >
                                <i class="fa fa-user c-login-success  child-box" aria-hidden="true"></i></div>
                                <div class="box-size-media">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </div>
                            </div>

                        <div class="col-md-0 col-lg-9 media-display-none" >

                            <div class="flex flex-md-column flex-sm-row">
                                <span class="f-12 c-ededed" id="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                <span class="f-13 bold c-ededed  media-ps-15 media-color-danger" style="cursor:pointer">
                                    Sign out
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="col-md-12 col-lg-3">
                            <div class="box-size-2 bg-color3">
                                <i class="fa fa-user fa-color-gray-light child-box" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-md-0 col-lg-9 media-display-none" >
                            <span class="f-12 c-ededed">Account</span>
                            <span class="f-13 bold c-ededed media-ps-15">Sign in</span>

                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-1 col-lg-2 col-sm-1 media-xs-1 force-hidden">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-12 col-lg-3 ">
                            <div class="box-size-2 bg-color3" style="cursor: pointer">
                                <a class="child-box" href="{{ route('checkout.cart')}}" >
                                    <i class="fa-solid fa-cart-shopping fa-color-gray-light " aria-hidden="true"></i>
                                    <span class="counter-cicle">
                                        <span class="child-counter-cicle amount-of-product-cart">0</span>
                                    </span>
                                </a>

                            </div>
                        </div>

                        <div class="col-md-0 col-lg-9 media-display-none">
                            <span class="f-12 c-ededed">Cart</span>
                            <span class="f-13 bold c-ededed"><span class="amount-of-product-cart">0</span>&nbsp; Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-lg-2 col-sm-1 media-xs-1 force-hidden no_decorate">
                    <a class="row justify-content-center align-items-center"
                       href="{{ route('review.orders')}}">
                        <div class="col-md-12 col-lg-3">
                            <div class="box-size-2 bg-color3">
                                <i class="fas fa-shipping-fast fa-color-gray-light child-box" aria-hidden="true"></i></div>
                        </div>

                        <div class="col-md-0 col-lg-9  media-display-none">
                            <span class="f-12 c-ededed">Review</span>
                            <span class="f-13 bold c-ededed">Orders</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </headerbar>
</header>