@extends('layouts.frontendLayout')

@section('content')
<div class="container f-15">
    <div class="row w-75 m-auto">
        <div class="col d-flex flex-row h-12 bg-white">
            <a href="{{ url()->previous() }}" class="w-40 border-end ps-2 no_decorate"><i class="fa-solid fa-angle-up fa-rotate-270"></i></a>
            <div class="w-100 text-center f-18 bold">Orders history</div>
        </div>
    </div>
    @foreach($data as $products)
    <div class="row mt-2 pb-4 bg-white w-75 m-auto">
        <div class="col">
            <div class="row h-12">
                <div class="col">
                    <span class="ps-3">Create date: </span>
                    <span class="bold f-18 ">{{$products['date']}} - {{$products['hour']}}</span>
                </div>
                <div class="col text-center">
                    <a href="{{route('review.order',['order_id' => $products['order_id']])}}">Review order {{$products['order_code']}} </a>
                </div>
                <div class="col text-right pe-4">
                    <span class="c-aaa">Order status: </span>
                    <span>{{$products['order_status']}}</span>
                </div>
            </div>
            @php
              $goodMoney =0
            @endphp
            @foreach($products['prds'] as $item)
                <div class="row specific-product bg-white py-2 my-2 m-auto w-90">
                    <a href="http://shop:8000/aothun/16" class="prd-libray-img me-1 col-md-2 col-xs-12 col-sm-12">
                        <img class="img-thumbnail" src="{{ URL::to('/') }}/images/{{$item['order_product_color']}}" alt="Thiet ke web Anh Ho" style="cursor: pointer" title="{{$item['order_product_color']}}">
                    </a>

                    <div class="d-flex flex-column col-md-9 col-xs-12 col-sm-12">
                        <div class="row">
                            <div class="col bold">{{$item['order_product_name']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3 line-through c-aaa"> </div>
                            <div class="col-3 bold "></div>
                            <div class="col-3 ">{{number_format($item['order_product_price'], 0, '.', ',')}} vnd</div>
                        </div>
                        <div class="row">
                            <div class="col-3  c-666">Color</div>
                            <div class="col-3  c-666">Size</div>
                            <div class="col-3  c-666">Sex</div>
                            <div class="col-3"><span class="c-666 f-12">Quantity:</span> {{$item['order_product_qty']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <span class="prd-img-color me-1">
                                    <img class="img-thumbnail img-circle selected" src="{{ URL::to('/') }}/images/{{$item['order_product_color']}}" alt="Thiet ke web Anh Ho" style="cursor: pointer" title="{{$item['order_product_color']}}">
                                </span>
                            </div>
                            <div class="col-3 bold">{{$item['order_product_size']}}</div>
                            <div class="col-3 bold  bold">{{$item['order_product_sex']}}</div>
                            <div class="col-3 bold  bold">{{number_format($item['order_product_qty'] * $item['order_product_price'], 0, '.', ',')}} vnd</div>
                        </div>

                    </div>
                </div>
                @php
                    $goodMoney +=$item['order_product_qty'] * $item['order_product_price']
                @endphp
            @endforeach
            <div class="row bg-white py-2 my-2 justify-content-end m-auto w-90">
                <div class="col-3 d-flex flex-column border-t text-right">
                    <span class="c-666">Goods money: </span>
                    <span class="c-666">Discount: </span>
                    <span class="c-666">Shipping fee: </span>
                    <span class="c-666">Total order: </span>
                </div>
                <div class="col-3 d-flex flex-column border-t me-4">
                    <span class="bold">{{number_format($goodMoney, 0, '.', ',')}} vnd</span>
                    <span class="">-{{number_format($products['order_discount_total'], 0, '.', ',')}} vnd</span>
                    <span class="">&nbsp; </span>
                    <span class="bold">{{number_format($products['order_total'], 0, '.', ',')}} vnd</span>
                </div>
            </div>
            <div class="row bg-white py-2 my-2 justify-content-end m-auto w-90">
                <div class="col border-t text-right"></div>
            </div>

            <!------------------->
        </div>
    </div>
    @endforeach

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
@endsection



