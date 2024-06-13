
<header class="grid items-center">
            <topbar id=topbar> </topbar>
            <headerbar id="headerbar">
                <div class="container">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <img class="w-167" src="{{ URL::to('/') }}/assets/images/logo_1.png" >
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12  block-search">
                            <input class="form-control me-2 bg-color3" type="search" placeholder="Search" aria-label="Search">
                            <i class="fab fa-sistrix icon-search"></i>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-3 col-sm-4 media-display-none">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa fa-user fa-color-gray-light child-box" aria-hidden="true"></i></div>
                                    </div>

                                <div class="col-md-9 col-sm-8 col-xs-12">
                                    @if (Auth::user())
                                    <div class="flex flex-md-column flex-sm-row">
                                        <span class="f-12 c-ededed" id="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                        <span class="f-13 bold c-ededed sign-out  media-ps-15 media-color-danger" style="cursor:pointer">
                                            <a href="{{ route('logout')}}">Sign out </a>
                                        </span>
                                    </div>
                                    @else
                                    <span class="f-12 c-ededed">Account</span>
                                    <span class="f-13 bold c-ededed show-modal-login media-ps-15 media-color-success" style="cursor:pointer">Sign in</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-3 col-sm-4 col-xs-4 media-display-none">
                                    <div class="box-size-2 bg-color3" style="cursor: pointer">
                                        <a class="child-box" href="{{ route('checkout.cart')}}" >
                                            <i class="fa-solid fa-cart-shopping fa-color-gray-light " aria-hidden="true"></i>
                                            <span class="counter-cicle">
                                                <span class="child-counter-cicle amount-of-product-cart">0</span>
                                            </span>
                                        </a>

                                    </div>
                                </div>

                                <div class="col-md-9 col-sm-8 col-xs-8">
                                    <span class="f-12 c-ededed">Cart</span>
                                    <span class="f-13 bold c-ededed"><span class="amount-of-product-cart">0</span>&nbsp; Products</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-4 no_decorate">
                            <a class="row justify-content-center align-items-center"
                               href="{{ route('review.orders')}}">
                                <div class="col-md-3 col-sm-4 col-xs-4 media-display-none">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fas fa-shipping-fast fa-color-gray-light child-box" aria-hidden="true"></i></div>
                                </div>

                                <div class="col-md-9 col-sm-8 col-xs-8">
                                    <span class="f-12 c-ededed">Review</span>
                                    <span class="f-13 bold c-ededed">Orders</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </headerbar>
        </header>