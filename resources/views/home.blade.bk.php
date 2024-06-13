@extends('layouts.frontendLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="my-carousel" class="carousel slide" data-bs-ride="carousel">
           <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ URL::to('/') }}/assets/images/sliders/slider1.png" class="d-block w-100" alt="anh ho">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::to('/') }}/assets/images/sliders/slider2.png" class="d-block w-100" alt="Anh Ho">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#my-carousel" data-bs-slide="prev">
                <span class="circle-gray prv-carousel">
                     <span class="carousel-control-prev-icon child-carousel-btn " aria-hidden="true"><
                     </span>
                     <span class="visually-hidden">Previous</span>
                </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#my-carousel" data-bs-slide="next">
                <span class="circle-gray nxt-carousel">
                    <span class="carousel-control-next-icon child-carousel-btn " aria-hidden="true">
                        >
                    </span>
                    <span class="visually-hidden">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="row justify-content-center bg-white my-3 mx-auto">
        <div id="my-testimonial" class="carousel slide" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
                 <button type="button" data-bs-target="#my-testimonial" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                 <button type="button" data-bs-target="#my-testimonial" data-bs-slide-to="1" aria-label="Slide 2"></button>
             </div>-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="{{ URL::to('/') }}/assets/images/testimonial/150x150_1_2.png" class="d-block clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Best seller</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="{{ URL::to('/') }}/assets/images/testimonial/150x150_2_2.png" class="d-block clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Best deal</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_3_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Shoes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_4_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Sandal</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_5_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">T-shirt</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_7_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Polo shirt</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_8_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">jacket</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_9_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Trousers</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_10_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Shorts</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_11_2.png" class="d-block w-100 clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Underwear</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_12_2.png" class="d-block clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">backpacks and bags</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_13_2.png" class="d-block clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Hat</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_14_2.png" class="d-block clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Belt</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="movie-card m-1 mx-4">
                        <div class="movie-img parent-img">
                            <img src="./assets/images/testimonial/150x150_15.png" class="d-block clss-child" alt="anh ho">
                        </div>
                        <div class="movie-title parent-text">
                            <p class="text-white text-sm-center font-small flex-center clss-child">Sock</p>
                        </div>
                    </div>
                </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#my-testimonial" data-bs-slide="prev">
                <span class="circle-gray prv-carousel">
                     <span class="carousel-control-prev-icon child-carousel-btn " aria-hidden="true"><
                     </span>
                     <span class="visually-hidden">Previous</span>
                </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#my-testimonial" data-bs-slide="next">
                <span class="circle-gray nxt-carousel">
                    <span class="carousel-control-next-icon child-carousel-btn " aria-hidden="true">
                        >
                    </span>
                    <span class="visually-hidden">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="h-100">
        <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-5">
            @if(count($products)>0)
            @foreach($products as $item)
                <div class="col prd-item flex-column">
                    <div class="prd-item-info bg-white">
                        @if($item->prd_regular_price)
                            @php $decresing_price = ($item->prd_price/$item->prd_regular_price)* 100  @endphp
                        @endif
                        <div class="prd-item-decrease f-10 tl-10 bold text-center">
                            -{{round($decresing_price)}}%
                        </div>
                        <a href="{{ route('product.aothun',['prd_id' => $item->prd_id]) }}" class="prd-item-photo">
                            <span class="prd-image-container">
                                <img class="prd-image-photo" src="{{ URL::to('/') }}/images/{{$item->prd_img}}" alt="anhho AnhHo">
                            </span>
                        </a>
                        <div class="prd-item-details flex-column">
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
                                <span class="prd-price">{{number_format($item->prd_price, 0, '.', ',')}}vnđ</span>
                                <span class="prd-regular-price">{{number_format($item->prd_regular_price, 0, '.', ',')}}vnđ</span>
                            </div>
                            <?php
                                if($item->prd_library !=''){
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
                                }
                            ?>

                            <div class="d-flex flex-row justify-content-end f-12 my-1 bold">
                                <i>Đã bán: </i>
                            </div>
                        </div>
                        <!-------------->
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript">

  $( document ).ready(function() {
      $(function() {
          $('#my-testimonial.carousel').carousel({
              interval: 10000,
              wrap: false
          })
      });

      $('#my-testimonial .carousel-item').each(function(){
          var minPerSlide = 5;
          var next = $(this).next();
          if (!next.length) {
              next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));

          for (var i=0;i<minPerSlide;i++) {
              next=next.next();
              if (!next.length) {
                  next = $(this).siblings(':first');
              }
              next.children(':first-child').clone().appendTo($(this));
          }
      });

  });

</script>
