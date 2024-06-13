@extends('layouts.frontendLayout')

@section('content')
<div class="container">
    <div class="h-100">
        @php
        $breadcrumb = 'Home > T-shirt > Male polo shirt';
        $title = 'COLLAR T-SHIRTS PRODUCT LIST';
        $amountOfProducts = 30
        @endphp

        @include('./include/filter_head')

        <div class="row">
            @include('./include/filter_part')

            <div class="col-md-9 col-lg-10 filtering-active p-s">
                <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-4">
                    @if(count($products)>0)
                    @foreach($products as $item)
                    <div class="col prd-item">
                        <div class="prd-item-info bg-white">
                            @if($item->prd_regular_price)
                            @php $decresing_price = ($item->prd_price/$item->prd_regular_price)* 100  @endphp
                            @endif
                            <div class="prd-item-decrease f-10 tl-10 bold text-center">
                                -{{round($decresing_price)}}%
                            </div>
                            <a href="{{ route('product.aothun',['prd_id' => $item->prd_id]) }}" class="prd-item-photo">
                            <span class="prd-image-container prd-item-photo-home">
                                <img class="prd-image-photo" src="{{ URL::to('/') }}/images/{{$item->prd_img}}" alt="anhho AnhHo">
                            </span>
                            </a>
                            <div class="prd-item-details">
                                <strong class="prd-item-name">
                                    <a title="{{$item->prd_name}}" class="prd-item-link"
                                       href="{{ route('product.aothun',['prd_id' => $item->prd_id]) }}">
                                        <div class="special-product-label mid-mid text-only ">
                                            <div class="text-center f-10 c-ff0000">
                                                <span>MỚI</span>
                                            </div>
                                        </div>
                                        {{$item->prd_name}}
                                    </a>
                                </strong>
                                <div class="d-inline fit-box">
                                    <span class="prd-price">${{number_format($item->prd_price, 0, '.', ',')}}</span>
                                    <span class="prd-regular-price">${{number_format($item->prd_regular_price, 0, '.', ',')}}</span>
                                </div>
                                <?php
                                if($item->multi_colors !=''){
                                    ?>
                                    <div class="d-flex flex-row  fit-box">
                                        <?php
                                        if(strpos($item->multi_colors,",")){
                                            $prd_library = explode(',',$item->multi_colors);
                                            foreach($prd_library as $image){
                                                ?>
                                                <span class="prd-img-color">
                                                <img class="img-thumbnail img-circle" src="{{ URL::to('/') }}/images/{{$image}}" alt="Thiet ke web Anh Ho">
                                            </span>
                                            <?php
                                            }
                                        }else{ ?>
                                            <span class="prd-img-color">
                                                <img class="img-thumbnail img-circle" src="{{ URL::to('/') }}/images/{{$item->multi_colors}}" alt="Thiet ke web Anh Ho">
                                            </span>
                                        <?php }
                                        ?>
                                    </div>
                                <?php
                                }else{
                                    ?>
                                    <span class="prd-img-color">
                                                <img class="img-thumbnail img-circle" src="{{ URL::to('/') }}/images/{{$item->prd_img}}" alt="Thiet ke web Anh Ho">
                                            </span>
                                <?php
                                }
                                ?>

                                <div class="d-flex flex-row justify-content-end f-12 my-1 bold">
                                    @php
                                    $amountOfProduct = '';
                                    if($item->amount_of_sold !=null){
                                    $amountOfProduct = $item->amount_of_sold;
                                    }
                                    @endphp
                                    <i>Sold: {{$amountOfProduct}}</i>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="carousel-container">
                <a class="slick-arrow slick-prev">
                    <i class="fas fa-angle-left"></i>
                </a>
                <div class="slick-list">
                    <div class="slick-track">
                        <div id="lastClone" class="slick-slide slick-cloned" data-index="1" tabindex="-1" aria-hidden="true" style="width: 584px;">
                            <div>
                                <a href="" aria-label="" tabindex="-1" style="width: 100%; display: inline-block">
                                    <img class="image" src="{{ URL::to('/') }}/images/12.Aothunnu4.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="slick-slide slick-cloned" data-index="1" tabindex="-1" aria-hidden="true" style="width: 584px;">
                            <div>
                                <a href="" aria-label="" tabindex="-1" style="width: 100%; display: inline-block">
                                    <img class="image" src="{{ URL::to('/') }}/images/13.no_neck11.png"  alt="">
                                </a>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-index="1" tabindex="-1" aria-hidden="true" style="width: 584px;">
                            <div>
                                <a href="" aria-label="" tabindex="-1" style="width: 100%; display: inline-block">
                                    <img class="image" src="{{ URL::to('/') }}/images/13.no_neck11.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div id="firstClone" class="slick-slide slick-cloned" data-index="1" tabindex="-1" aria-hidden="true" style="width: 584px;">
                            <div>
                                <a href="" aria-label="" tabindex="-1" style="width: 100%; display: inline-block">
                                    <img class="image" src="{{ URL::to('/') }}/images/16.no_neck33.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="slick-arrow slick-next">
                    <i class="fas fa-angle-right"></i>
                </a>
                <ul class="slick-dots">
                    <li class="slick-active">
                        <button>1</button>
                    </li>
                    <li class="">
                        <button>2</button>
                    </li>
                    <li class="">
                        <button>3</button>
                    </li>

                </ul>
            </div>
        </div>

    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script  src="{{ URL::to('/') }}/assets/js/filter.js"></script>
<script>
    /*var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }*/

    $('.collapsible').unbind('click').bind('click',function(){
        this.classList.toggle("collapsible-active");
        var collapse_content = this.nextElementSibling;
        if (collapse_content.style.maxHeight){
            collapse_content.style.maxHeight = null;
        } else {
            collapse_content.style.maxHeight = collapse_content.scrollHeight + "px";
        }
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        var arrowLeft = document.querySelector('.slick-prev');
        var arrowRight = document.querySelector('.slick-next');

        var slickTrack = document.querySelector('.slick-track');
        var slickSlice = document.querySelectorAll('.slick-slide');
        var slickDots = document.querySelectorAll('.slick-dots li');

        var btn = document.querySelectorAll('.slick-dots button');
        var eleIsClicked = 0;

        var size = slickSlice[0].clientWidth;
        var count = 1, time = 10000;
        var stateTab = true;
        var stateTranslateOfSlickTrack = true;
        var v_interval = "";

        var hidden, visibilityChange;
        if (typeof document.hidden !== "undefined") {
            hidden = "hidden";
            visibilityChange = "visibilitychange";
        } else if (typeof document.msHidden !== "undefined") {
            hidden = "msHidden";
            visibilityChange = "msvisibilitychange";
        } else if (typeof document.webkitHidden !== "undefined") {
            hidden = "webkitHidden";
            visibilityChange = "webkitvisibilitychange";
        }

        function handleVisibilityChange() {
            stateTab = (document[hidden])?false:true;
            if(stateTab){
                run_setInterval();
            }else{
                run_clearInterval();
            }
        }

        document.addEventListener(visibilityChange, handleVisibilityChange, false);

        // Khi click vào arrow left
        arrowLeft.addEventListener("click", function(e){
            if(stateTranslateOfSlickTrack){
                run_clearInterval();
                commonFuncBothArrows(true,false,e);
                run_setInterval();
            }
        });

        // Khi click vào arrow right
        arrowRight.addEventListener("click", function(e){
            if(stateTranslateOfSlickTrack){
                run_clearInterval();
                commonFuncBothArrows(false,true,e);
                run_setInterval();
            }
        });

        function commonFuncBothArrows(arrowL,arrowR,e){
            e.preventDefault();
            stateTranslateOfSlickTrack = false;
            if(arrowL){
                if(count <= 0 ){ return; }
            }else{
                if(arrowR){
                    if(count >= slickSlice.length - 1){ return;}
                }
            }
            slickDots[count-1].classList.remove('slick-active');
            slickTrack.style.transition = `transform 0.5s ease-in-out`;
            count = arrowL?--count:++count;
            console.log('count - ' + count);
            slickTrack.style.transform = `translate3d(${-size*count}px,0px,0px)`;
            eleIsClicked=count-1;
            switch (count) {
                case 0:
                    slickDots[slickDots.length-1].classList.add('slick-active');
                    break;
                case slickSlice.length-1:
                    slickDots[0].classList.add('slick-active');
                    break;
                default:
                    slickDots[count-1].classList.add('slick-active');
                    break;
            }
        }

        btn.forEach((elem) => {
            elem.addEventListener('click', ()=>{
            if(stateTranslateOfSlickTrack){
            run_clearInterval();
            slickTrack.style.transition = `transform 0.5s ease-in-out`;
            count = Number(elem.textContent);
            console.log("eleIsClicked - btn - " + eleIsClicked)
            slickDots[eleIsClicked].classList.remove('slick-active');
            slickDots[count-1].classList.add('slick-active');
            slickTrack.style.transform = `translate3d(${-size*count}px,0px,0px)`;
            eleIsClicked = count-1;
            run_setInterval();
        }
    });
    });

    run_setInterval();
    function run_setInterval(){
        v_interval = setInterval(()=>{
            console.log('cnt= ' + (count))
        slickDots[count-1].classList.remove('slick-active');
        slickTrack.style.transition ="transform 0.5s ease-in-out";
        slickTrack.style.transform = `translate3d(${-size*(++count)}px,0px,0px)`;
        eleIsClicked=count-1;
        if(count === slickSlice.length - 1){
            slickDots[0].classList.add('slick-active');
        }else{
            slickDots[count-1].classList.add('slick-active');
        }
    }, time);
    }

    function run_clearInterval(){
        clearInterval(v_interval);
    }

    slickTrack.addEventListener('transitionend', ()=>{
        stateTranslateOfSlickTrack = true;
    let nameClassSlickSlide = slickSlice[count].id;
    if(nameClassSlickSlide === 'lastClone' || nameClassSlickSlide === 'firstClone'){
        console.log("count= "+count)
        slickTrack.style.transition = `none`;
        count = (nameClassSlickSlide === 'lastClone')?slickSlice.length - 3:(nameClassSlickSlide === 'firstClone')?1:count;
        eleIsClicked = count -1;
        slickTrack.style.transform = `translateX(-${size*count}px)`;
    }
    })
    },false)
</script>
@endsection