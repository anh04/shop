
<header class="grid items-center">
    <topbar id=topbar> </topbar>
    <headerbar id="headerbar">
        <div class="container">
            <div class="row h-100  align-items-center media-flex">
                <div class="col-md-10 col-lg-10 col-sm-8 media-xs-7 force-hidden">
                    <img class="w-167" src="{{ URL::to('/') }}/assets/images/logo_1.png" >
                </div>
                <div class="col-md-2 col-lg-2 col-sm-4 media-xs-4 force-hidden">
                    <div class="row justify-content-center align-items-center  show-modal-login" style="cursor:pointer">
                        @if (Auth::user())
                        <div class="col-md-3 col-lg-3">
                            <div class="box-size-2 bg-color3">
                                <i class="fa fa-user c-login-success  child-box" aria-hidden="true"></i></div>
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
            </div>
        </div>
    </headerbar>
</header>