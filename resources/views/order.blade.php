@extends('layouts.frontendLayout')

@section('content')
<div class="container f-15">
    <div class="row w-75 m-auto">
        <div class="col d-flex flex-row h-12 bg-white">
            <a href="{{ url()->previous() }}" class="w-40 border-end ps-2"><i class="fa-solid fa-angle-up fa-rotate-270"></i></a>
            <div class="w-100 text-center f-18 bold">Order details {{$products['order_code']}}</div>
        </div>
    </div>
    <div class="row mt-2 pb-4 bg-white w-75 m-auto">
        <div class="col">
            <div class="row h-12">
                <div class="col">
                    <span class="ps-3">Create date: </span>
                    <span class="bold f-18 ">{{$products['date']}} - {{$products['hour']}}</span>
                </div>
                <div class="col text-right pe-4">
                    <span class="c-aaa">Order status: </span>
                    <span>{{$products['order_status']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col b-r-5 bg-gray-200 px-2 py-3" style="margin-left:25px; margin-right: 25px; width: 98%;">
                    <div class="row">
                        <div class="col-md-2 col-xm-6 col-sm-6 ps-md-3 ps-ms-1 ps-xs-1 c-aaa">  Receiver : </div>
                        <div class="col-md-10 col-xm-6 col-sm-6 ps-0 d-flex flex-col">
                            <span>{{$products['full_name']}}, {{$products['shipment_phone']}}</span>
                            <span>{{$products['shipment_address']}}, {{$products['shipment_ward']}},
                            {{$products['shipment_district']}}, {{$products['shipment_city']}}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 col-xm-6 col-sm-6 ps-md-3 ps-ms-1 ps-xs-1 c-aaa">  Delivery time : </div>
                        <div class="col-md-10 col-xm-6 col-sm-6 ps-0 d-flex flex-col">
                            <span>{{$products['delivery_time']}}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 col-xm-6 col-sm-6 ps-md-3 ps-ms-1 ps-xs-1 c-aaa">  Payment method : </div>
                        <div class="col-md-10 col-xm-6 col-sm-6 ps-0 d-flex flex-col">
                            <span>{{$products['order_payment_method']}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-light c-888" >Feedback product quality</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 ps-3">
                <div class="col">Delivery History</div>
            </div>
            @php
                $bg_confirm ='bg-ededed';
                $bg_shipped ='bg-ededed';
                $bg_delivering ='bg-ededed';
                $bg_delivered ='bg-ededed';
                $circle_bg_confirm = 'circle-ededed';
                $circle_bg_shipped = 'circle-ededed';
                $circle_bg_delivering = 'circle-ededed';
                $circle_bg_delivered = 'circle-ededed';
                $text_confirm = 'c-c5c5c5';
                $text_shipped = 'c-c5c5c5';
                $text_delivering = 'c-c5c5c5';
                $text_delivered= 'c-c5c5c5';

            if($products['order_status'] == 'Checking'){
                $bg_confirm ='bg-success';
                $circle_bg_confirm = 'circle-success';
                $text_confirm = 'text-success';
            }elseif($products['order_status'] == 'Shipped'){
                $bg_shipped = $bg_confirm ='bg-success';
                $circle_bg_shipped = $circle_bg_confirm = 'circle-success';
                $text_shipped = $text_confirm = 'text-success';
            }elseif($products['order_status'] == 'Delivering'){
                $bg_delivering = $bg_shipped = $bg_confirm ='bg-success';
                $circle_bg_delivering = $circle_bg_shipped = $circle_bg_confirm = 'circle-success';
                $text_delivering = $text_shipped = $text_confirm = 'text-success';
            }elseif($products['order_status'] == 'Delivered'){
                $bg_delivering = $bg_shipped = $bg_confirm ='bg-success';
                $circle_bg_delivered = $circle_bg_delivering = $circle_bg_shipped = $circle_bg_confirm = 'circle-success';
                $text_delivered = $text_delivering = $text_shipped = $text_confirm = 'text-success';
            }

            $shipped_date='';
            $shipped_time1='';
            if($products['shipped_time'] !=null){
                $shipped_date= \Carbon\Carbon::parse($products['shipped_time'])->format('d/m/Y');
                $shipped_time1= \Carbon\Carbon::parse($products['shipped_time'])->format('h:m');
            }

            $delivering_date='';
            $delivering_time1='';
            if($products['delivering_time'] !=null){
                $delivering_date= \Carbon\Carbon::parse($products['delivering_time'])->format('d/m/Y');
                $delivering_time1= \Carbon\Carbon::parse($products['delivering_time'])->format('h:m');
            }

            $delivered_date='';
            $delivered_time1='';
            if($products['delivered_time'] !=null){
                $delivered_date= \Carbon\Carbon::parse($products['delivered_time'])->format('d/m/Y');
                $delivered_time1= \Carbon\Carbon::parse($products['delivered_time'])->format('h:m');
            }
            @endphp

            <div class="row h-2 mt-4 d-flex flex-row m-auto w-80">
                <div class="w-33 {{$bg_confirm}} position-relative">
                    <div class="absolute-hw-11 {{$circle_bg_confirm}} possion-l-0 possion-t--7"></div>
                </div>

                <div class="w-33 {{$bg_shipped}} position-relative">
                    <div class="absolute-hw-11 {{$circle_bg_shipped}} possion-l-0 possion-t--7"></div>
                </div>
                <div class="w-33 {{$bg_delivering}} position-relative">
                    <div class="absolute-hw-11 {{$circle_bg_delivering}} possion-l-0 possion-t--7"></div>
                    <div class="absolute-hw-11 {{$circle_bg_delivered}} possion-r-0 possion-t--7"></div>
                </div>
            </div>
            <div class="row mt-3 mb-5 d-flex flex-row m-auto w-80 f-12">
                <div class="w-33 position-relative">
                    <div class="position-absolute possion-l--20 d-flex flex-column">
                        <span class="{{$text_confirm}}">Confirmed</span>
                        <span class="c-c5c5c5">{{$products['hour']}} - {{ \Carbon\Carbon::parse($products['created_at'])->format('d/m/Y') }} </span>
                    </div>
                </div>

                <div class="w-33 position-relative">
                    <div class="position-absolute possion-l--20  d-flex flex-column">
                        <span class="{{$text_shipped}}">Shipped</span>
                        <span class="c-c5c5c5"> {{$shipped_time1}} - {{ $shipped_date }}</span>
                    </div>
                </div>
                <div class="w-33 position-relative">
                    <div class="position-absolute possion-l--20  d-flex flex-column">
                        <span class="{{$text_delivering}}">Delivering</span>
                        <span class="c-c5c5c5">{{$delivering_time1}} - {{ $delivering_date }}</span>
                    </div>
                    <div class="position-absolute possion-r--20  d-flex flex-column">
                        <span class="{{$text_delivered}}">Delivered</span>
                        <span class="c-c5c5c5">{{$delivered_time1}} - {{ $delivered_date }}</span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col h-1 bg-fafafa mx-4"> </div>
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

            <div class="row bg-white py-2 my-2 m-auto w-90">
                <div class="col">
                    <div class="row"> <div class="col c-c5c5c5">Custormer reviews</div></div>
                     <div class="row">
                         <div class="col-3 mx-1 unsatisfied" style="cursor: pointer">
                             <span class=" d-flex flex-row border border-secondary h-35 border-radius-5" >
                                 <i class="bi bi-emoji-astonished text-secondary px-3 f-18 d-flex align-items-center"></i>
                                 <span class="px-3 d-flex align-items-center text-secondary">Unsatisfied</span>
                                 <i class="bi bi-check-circle text-secondary px-3 f-18 d-flex align-items-center"></i>
                             </span>
                         </div>
                         <div class="col-3 mx-1 satisfied" style="cursor: pointer">
                             <span class=" d-flex flex-row border border-secondary h-35 border-radius-5" >
                                 <i class="bi bi-emoji-grin text-secondary px-3 f-18 d-flex align-items-center"></i>
                                 <span class="px-3 d-flex align-items-center text-secondary">Satisfied &nbsp;&nbsp;&nbsp;</span>
                                 <i class="bi bi-check-circle text-secondary px-3 f-18 d-flex align-items-center"></i>
                             </span>
                         </div>
                     </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label  class="form-label c-c5c5c5">Please give us your feedback so we can serve you better</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="accept-call-from-us" checked>
                                <label class="form-check-label" for="accept-call-from-us">
                                    Accept calls from us
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <button class="btn btn-secondary form-control">Submit review</button>
                        </div>
                    </div>
                </div>

            </div>
            <!------------------->
        </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
@endsection



