
@extends('layouts.frontendLayout')

@section('content')
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
    <div id="p-cart" class="px-1 py-1">
        <div class="row">
            <div class="col-md-7 col-xs-12 col-sm-12" id="show-cart"> </div>
            <div class="col-md-5 col-xs-12 col-sm-12 py-2">
                <div class="row ps-4">
                    <div class="col bg-white" style="height: 100px">
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
                </div>
                <div class="row ps-3 mt-4 app-code">
                    <div class="col-md-12 f-16 bold">Discount code <span class="discount-valid hidden-cls text-danger f-13">(is invalid)</span></div>
                    <div class="col-md-8 input-white">
                        <input class="form-control discount-code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success form-control btn-app-discount">Apply code</button>
                    </div>
                </div>
                <div class="row ps-3 mt-3">
                    <div class="col-md-8"> Amount of money</div>
                    <div class="col-md-4 shipping-fee text-right amount-of-money"></div>
                </div>
                <div class="row ps-3 mt-3">
                    <div class="col-md-8">Discount</div>
                    <div class="col-md-4 shipping-fee text-right discount"></div>
                </div>
                <div class="row ps-3 mt-3">
                    <div class="col-md-8"> Shipping fee</div>
                    <div class="col-md-4 shipping-fee text-right">$0.00</div>
                </div>
                <div class="row ps-3 mt-3">
                    <div class="col-md-8 bold"> Total money</div>
                    <div class="col-md-4 shipping-fee text-right bold total-money"></div>
                    <div class="col-md-12 f-13 bold c-aaa">(Includeed VAT)</div>
                </div>
                <div class="row ps-3 mt-4">
                    <div class="col-md-12">
                        <a class="btn btn-success form-control bold" href="{{route('checkout.payment')}}">Go to pay</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-12 f-16 bold">Suggested Products</label>
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script  src="{{ URL::to('/') }}/assets/js/cart.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/common.js"></script>


@endsection


