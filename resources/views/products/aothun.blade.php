
@extends('layouts.frontendLayout')

@section('content')
<script>
    function zoomfocusin(){
        $(".img-zoom-lens").css({"display":"block"})
        $(".img-zoom-result").css({"display":"block"})
    }
</script>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <?php
    $prd_id='';
    $prd_type_name ='';
    $prd_batch_code='';
    $prd_name='';
    $prd_quantity='';
    $prd_type ='';
    $prd_sku ='';
    $prd_quantity ='';
    $prd_price ='';
    $prd_regular_price ='';
    $prd_disctiption ='';
    $prd_short_disctiption ='';
    $prd_sex  ='';
    $prd_size ='';
    $prd_color ='';
    $multi_colors ='';
    $multi_sizes ='';
    $multi_sexes='';
    $prd_tag ='';
    $prd_relative ='';
    $prd_img ='';
    $prd_library ='';
    if(isset($product)){
        $prd_id=$product->prd_id;
        $prd_type_name ="<option value='".$product->prd_type."'>$product->prd_type_name</option>";
        $prd_batch_code = $product->prd_batch_code;
        $prd_name= $product->prd_name;
        $prd_quantity= $product->prd_quantity;
        $prd_type = $product->prd_type;
        $prd_sku = $product->prd_sku;
        $prd_price = $product->prd_price;
        $prd_regular_price = $product->prd_regular_price;
        $prd_disctiption = $product->prd_disctiption;
        $prd_short_disctiption = $product->prd_short_disctiption;
        $prd_sex = $product->prd_sex;
        $prd_size= $product->prd_size;
        $prd_color = $product->prd_color;
        $multi_colors = $product->multi_colors;
        $multi_sizes = $product->multi_sizes;
        $multi_sexes = $product->multi_sexes;
        $prd_tag = $product->prd_tag;
        $prd_relative = $product->prd_relative;
        $prd_img = $product->prd_img;
        $prd_library = $product->prd_library;
    }

    ?>

    <div  id="p-product">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xm-12">
            <!---------------Left-------------------->
                <div class="bg-white justify-content-center d-flex">
                    <div class="img-zoom-area-container" onmouseout="zoomfocusout()" onmouseover="zoomfocusin()">
                        <div class="img-zoom-lens"></div>
                        <img id="zoomed-image" src="{{ URL::to('/') }}/images/{{$prd_img}}">
                    </div>
                </div>

                <?php
                if($prd_library !=''){
                    ?>
                    <div class="d-flex flex-row  fit-box pb-3 mt-2">
                        <span class="prd-imgs-page ">
                            <img class="img-thumbnail library-img-selected-source" src="{{ URL::to('/') }}/images/{{$prd_img}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                        </span>
                        <?php
                        if(strpos($prd_library,",")){
                            $prd_library = explode(',',$prd_library);
                            foreach($prd_library as $image){
                                ?>
                                <span class="prd-imgs-page me-1 ">
                                    <img class="img-thumbnail library-img-selected-source" src="{{ URL::to('/') }}/images/{{$image}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                                </span>
                            <?php
                            }
                        }else{ ?>
                            <span class="prd-imgs-page">
                                <img class="img-thumbnail library-img-selected-source" src="{{ URL::to('/') }}/images/{{$prd_library}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                            </span>
                        <?php }
                        ?>
                    </div>
                <?php
                }else{
                    ?>
                    <span class="prd-imgs-page">
                        <img class="img-thumbnail img-selected-source" src="{{ URL::to('/') }}/images/{{$prd_img}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                    </span>
                <?php }
                ?>

            </div>
            <!---------------Right-------------------->
            <div class="col-md-6 col-sm-12 col-xm-12 row-zoom">
                <div id="zoom-result" class="img-zoom-result"></div>
                <div class="page-pduct d-flex flex-column">
                    <div class="specific-product">
                        <input type="hidden" class="prd_id" value="{{$prd_id}}">
                        <input type="hidden" class="prd_name" value="{{$prd_name}}">
                        <input type="hidden" class="prd_price" value="{{$prd_price}}">
                        <input type="hidden" class="prd_regular_price" value="{{$prd_regular_price}}">
                        <div class="col-md-12 col-sm-12 mb-1">
                            <div class="special-product-label mid-mid text-only w-40">
                                <div class="text-center f-10 c-ff0000">
                                    <span>New</span>
                                </div>
                            </div>
                        </div>
                        <strong class="prd-item-name">
                            <a title="{{$prd_name}}" class="prd-item-link"
                               href="{{ route('product.aothun',['prd_id' => $prd_id]) }}">
                                {{$prd_name}}
                            </a>
                        </strong>
                        <div class="d-inline fit-box border-bottom">
                            <span class="prd-price">${{number_format($prd_price, 0, '.', ',')}}</span>
                            <span class="prd-regular-price ms-2">${{number_format($prd_regular_price, 0, '.', ',')}}</span>
                            <div class="d-flex justify-content-end">
                                <span class="d-flex flex-md-column flex-sm-row flex-sm-row">
                                    <span class="bold f-14">Đã bán: 18</span>
                                    <span class="f-12 bold c-ff0000"><i class="fa fa-heart "></i> &nbsp; Love</span>
                                </span>
                            </div>
                            <div class="f-12 bold c-666">(The listed price of the product includes tax)</div>
                        </div>
                        <div class="fit-box f-15 py-1 c-888"><i>Select color:</i></div>
                        <?php
                        if($multi_colors !=''){
                            ?>
                            <div class="d-flex flex-row  fit-box pb-3">
                                <span class="prd-img-color me-1">
                                     <img class="img-thumbnail img-circle img-selected-source selected" src="{{ URL::to('/') }}/images/{{$prd_img}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                               </span>
                                <?php
                                if(strpos($multi_colors,",")){
                                    $multi_colors = explode(',',$multi_colors);
                                    foreach($multi_colors as $image){
                                        ?>
                                        <span class="prd-img-color me-1">
                                            <img class="img-thumbnail img-circle img-selected-source" src="{{ URL::to('/') }}/images/{{$image}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                                        </span>
                                    <?php
                                    }
                                }else{ ?>
                                    <span class="prd-img-color">
                                        <img class="img-thumbnail img-circle img-selected-source" src="{{ URL::to('/') }}/images/{{$multi_colors}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                                    </span>
                                <?php }
                                ?>
                            </div>
                        <?php
                        }else{
                            ?>
                            <span class="prd-img-color">
                                        <img class="img-thumbnail img-circle img-selected-source selected" src="{{ URL::to('/') }}/images/{{$prd_img}}" alt="Thiet ke web Anh Ho" style="cursor: pointer">
                                    </span>
                        <?php
                        }
                        ?>
                        <div class="fit-box f-15 pb-1 c-888"><i>Select size:</i></div>
                        <div class="fit-box f-15 pb-3">
                            <?php
                            if($multi_sizes !=''){
                                ?>
                                <div class="d-flex flex-row  fit-box pb-3">
                                    <?php
                                    if(strpos($multi_sizes,",")){
                                        $multi_sizes = explode(',',$multi_sizes);
                                        $selected ='';
                                        foreach($multi_sizes as $size){
                                            $selected ='';
                                            if($size=="M"){
                                                $selected ="selected";
                                            }
                                            ?>
                                            <span class="prd-size me-1 f-15 text-center {{$selected}}">{{$size}}</span>
                                        <?php
                                        }
                                    }else{ ?>
                                        <span class="prd-size me-1 f-15 text-center selected">{{$multi_sizes}}</span>
                                    <?php }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="fit-box f-15 pb-1 c-888"><i>Sex: </i></div>
                        <div class="fit-box f-15 pb-3">
                            {{$product->prd_sex}}
                        </div>
                        <div class="fit-box f-15 mb-3 bg-white" style="height:100px">
                            <div class="row justify-content-center h-100">
                                <div class="col-3 box-size-100">
                                    <i class="fa-solid fa-gift child-box f-35 c-20c997"></i>
                                </div>
                                <div class="col-6">
                                    @if(count($discounts)> 0 )
                                    @foreach($discounts as $item)
                                    <div class="box-size-100">
                                        <div class="child-box d-flex flex-column">
                                            <span class="f-20">
                                                <span class="f-14">Discount code:</span>
                                                <strong class="f-20">{{$item->discount_code}}</strong>
                                            </span>
                                            <span class="f-14 c-20c997">${{number_format($item->discount_amount,2) }} discount for orders with total amount greater than ${{number_format($item->app_total,2) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="col-3 box-size-100">
                                    <i class="fa-solid fa-gift child-box f-35 c-20c997"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-inline fit-box f-15 pb-3 mt-3 d-flex d-flex-row">
                            <div class="input-group mb-3 closest-btn-action">
                                <button class="btn btn-outline-secondary" type="button" id="minus-prduct-btn">-</button>
                                <input type="text" class="form-control amount-prduct" value="1" placeholder="" aria-label="Example text with button addon">
                                <button class="btn btn-outline-secondary" type="button" id="plus-prduct-btn">+</button>
                            </div>
                            <a class="btn btn-warning btn-buy-now" href="{{route('checkout.payment')}}">Buy now</a>

                            <button class="btn btn-dark btn-add-to-cart">Add to cart</button>
                        </div>
                    </div>
                    <div class="row">
                        <!------------------Left---------------->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa fa-truck fa-rotate-360 f-18 bg-ededed child-box" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-8 d-flex flex-column">
                                    <span class="f-15 bold">Free shipping</span>
                                    <span class="f-13 ">for orders from $500</span>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa-solid fa-cart-shopping bg-ededed child-box" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-8 d-flex flex-column">
                                    <span class="f-15 bold">Free returns</span>
                                    <span class="f-13 ">within 30 days</span>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa-solid fa-money-check bg-ededed child-box" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-8 d-flex flex-column">
                                    <span class="f-15 bold">DIVERSITY</span>
                                    <span class="f-13 ">payments</span>
                                </div>
                            </div>
                        </div>
                        <!------------------Right---------------->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa-solid fa-truck-fast f-18 bg-ededed child-box" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-8 d-flex flex-column">
                                    <span class="f-15 bold">Fast delivery</span>
                                    <span class="f-13 ">nationwide</span>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa fa-adjust f-18 bg-ededed child-box" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-8 d-flex flex-column">
                                    <span class="f-13">Procedures for exchanging goods</span>
                                    <span class=" f-15 bold ">EASY</span>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="box-size-2 bg-color3">
                                        <i class="fa-solid fa-cart-circle-check bg-ededed child-box" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-8 d-flex flex-column">
                                    <span class="f-15 bold">GOODS ARE CHECKED</span>
                                    <span class="f-13 ">before payment</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center h-60 mb-3 mx-3 px-3 bg-ededed f-15">
                        <div class="">Shipping address: <span class="shipping-to"></span></div>
                        <div class="change-address c-2267ed"><i class="fa fa-pencil c-2267ed" aria-hidden="true"></i>&nbsp;Change address</div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="row my-3 pduct-tabs">
            <ul class="nav nav-pills nav-justified bg-ededed line-h40 bold f-15"  role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-pduct-tab" data-bs-toggle="pill" data-bs-target="#description-pduct" type="button" role="tab" aria-controls="description-pduct" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="technical-pduct-tab" data-bs-toggle="pill" data-bs-target="#technical-pduct" type="button" role="tab" aria-controls="technical-pduct" aria-selected="false">Technical info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pduct-brand-tab" data-bs-toggle="pill" data-bs-target="#pduct-brand" type="button" role="tab" aria-controls="pduct-brand" aria-selected="false">Brand</button>
                </li>
            </ul>
            <div class="tab-content hm-200 bg-white py-3 px-3">
                <div class="tab-pane fade show active" id="description-pduct" role="tabpanel" aria-labelledby="description-pduct-tab">
                   <?=nl2br($prd_disctiption);?>
                </div>
                <div class="tab-pane fade" id="technical-pduct" role="tabpanel" aria-labelledby="technical-pduct-tab">
                    <?=nl2br($prd_short_disctiption);?>
                </div>
                <div class="tab-pane fade" id="pduct-brand" role="tabpanel" aria-labelledby="pduct-brand-tab">
                  Cay chi biet tham thi
                </div>
            </div>
        </div>
    </div>
</div>
<script>const js_prd_type_name = {{ Js::from($prd_type_name) }};</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/product/product.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/library_images.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/common.js"></script>
<script>
    //window.addEventListener("load", imageZoom("zoomed-image","zoom-result"))

    function zoomfocusout(){
        $(".img-zoom-lens").css({"display":"none"})
        $(".img-zoom-result").css({"display":"none"})
    }

    function imageZoom(imgID,area_show) {
        let img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(area_show);
        lens = document.querySelector(".img-zoom-lens");
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
        function moveLens(e) {
            let pos, x, y;
            e.preventDefault();
            pos = getCursorPos(e);
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
            if (x < 0) {x = 0;}
            if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if (y < 0) {y = 0;}
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }
        function getCursorPos(e) {
            let a, x = 0, y = 0;
            e = e || window.event;
            a = img.getBoundingClientRect();
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }
    (function () {
        imageZoom("zoomed-image","zoom-result");
        $(".img-zoom-result").css({"display":"none"})
        $(".img-zoom-lens").css({"display":"none"})
        /*
         let originalImg = document.querySelector("#my-image");
         let galleryImg = document.querySelector(".img-gallery").children;

         for(let i = 0; i < galleryImg.length; i++) {
         galleryImg[i].onclick = function() {
         originalImg.setAttribute("src", this.getAttribute("src"));
         imageZoom("my-image");
         };
         }
         */
    })();
</script>
@endsection


