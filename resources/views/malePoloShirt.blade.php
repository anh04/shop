@extends('layouts.frontendLayout')

@section('content')
<link href="{{ asset('css/carousel1.css') }}" rel="stylesheet">
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
            <div class="carousel" role="group" aria-roledescription="carousel" data-carousel aria-label="Student testimonials">
                <div class="carousel-buttons">
                    <button
                        class="carousel-button carousel-button_previous"
                        aria-label="Previous slide"
                        data-carousel-button-previous
                        >
                        <span class="fas fa-chevron-circle-left"></span>
                    </button>
                    <button
                        class="carousel-button carousel-button_next"
                        aria-label="Next slide"
                        data-carousel-button-next
                        >
                        <span class="fas fa-chevron-circle-right"></span>
                    </button>
                </div>
                <div
                    class="slides"
                    aria-live="polite"
                    data-carousel-slides-container
                    >
                    <div
                        class="slide"
                        role="group"
                        aria-roledescription="slide"
                        aria-hidden="false"
                        aria-labelledby="bob"
                        >
                        <h2 id="bob">Bob</h2>
                    </div>

                    <div
                        class="slide"
                        role="group"
                        aria-roledescription="slide"
                        aria-hidden="true"
                        aria-labelledby="alice"
                        >
                        <h2 id="alice">Alice</h2>
                    </div>

                    <div
                        class="slide"
                        role="group"
                        aria-roledescription="slide"
                        aria-hidden="true"
                        >
                        <div class="content content-1">
                            <div class="text-container">
                                <h2 id="a11y-slide-title">Best frameworks</h2>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="slide" role="group" aria-roledescription="slide" aria-hidden="true">
                        <div class="content content-2">
                            <div class="text-container">
                                <h2 id="a11y-slide-title">Best frameworks</h2>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="slide" role="group" aria-roledescription="slide" aria-hidden="true">
                        <div class="content content-3">
                            <div class="text-container">
                                <h2 id="a11y-slide-title">Best frameworks</h2>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel ducimus fugit sed atque dolores! Odio corporis
                                    magnam ipsam perferendis praesentium, reiciendis officiis blanditiis rem fuga ipsum debitis totam, quos atque.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script  src="{{ URL::to('/') }}/assets/js/filter.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/carousel1.js"></script>
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

@endsection