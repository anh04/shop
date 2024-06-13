
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
            <div class="col-md-7 col-xs-12 col-sm-12">
                <div class="row">
                    <fieldset class="border shipment-info">
                      <form id="form-payment" class="needs-validation">
                          {{ csrf_field() }}
                        <legend class="float-none w-auto f-20 bold">Shipment info</legend>
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="validationfull_name">Full name</label>
                                <input class="form-control full_name el" id="validationfull_name" key_clmn="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-3">
                                <label>Phone number</label>
                                <input class="form-control shipment_phone el" key_clmn="shipment_phone" name="shipment_phone" value="{{ old('shipment_phone') }}" required>
                                <div class="invalid-feedback">
                                    Please choose a phone.
                                </div>
                            </div>
                            <div class="col-3">
                                <label>Email</label>
                                <input type="email" class="form-control el shipment_email" name="shipment_email" value="{{ old('shipment_email') }}" required autocomplete="shipment_email" autofocus
                                        key_clmn="shipment_email">
                                <div class="invalid-feedback">
                                    Please choose a email address.
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4">
                                <label>State</label>
                                <div class="input-white ">
                                    <select class="form-select shipment_city el" key_clmn="shipment_city" name="shipment_city" required>
                                        <option></option>
                                        @if(count($states) >0)
                                          @foreach($states as $item)
                                             <option value="{{$item->code}}">{{$item->state}}</option>
                                          @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a State.
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <label>City</label>
                                <select class="form-select shipment_district el" key_clmn="shipment_district" name="shipment_district" required></select>
                                <div class="invalid-feedback">
                                    Please choose a City.
                                </div>
                            </div>
                            <div class="col-4">
                                <label>Zip</label>
                                <select class="form-select shipment_ward el" key_clmn="shipment_ward" required="shipment_ward" required></select>
                                <div class="invalid-feedback">
                                    Please choose a Zip.
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Address</label>
                                <input class="form-control shipment_address el" key_clmn="shipment_address" name="shipment_address" required>
                                <div class="invalid-feedback">
                                    Please choose a Zip.
                                </div>
                            </div>
                        </div>
                        <div  class="row my-2">
                            <div class="col">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input el" key_clmn="shipment_company" type="radio" name="shipment_company"
                                           value="home" id="shipment_company">
                                    <label class="form-check-label" for="at_company">At your company</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked="checked" type="radio" name="shipment_company"
                                           id="at_home" value="company">
                                    <label class="form-check-label" for="at_home">At your home</label>
                                </div>
                            </div>
                        </div>
                        <div  class="row my-2">
                            <div class="col">
                                <label>Note</label>
                                <textarea class="shipment_note form-control el" key_clmn="shipment_note" rows="3"></textarea>
                            </div>
                        </div>
                        <div  class="row my-2">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input el" key_clmn="is-invoice" type="checkbox" value="" id="is-invoice">
                                    <label class="form-check-label" for="is-invoice">
                                        Get invoice for order
                                    </label>
                                </div>
                            </div>
                        </div>
                      </form>
                    <fieldset>
                </div>
                <div class="row">
                    <fieldset class="border shipment-info mt-4">
                        <legend class="float-none w-auto f-20 bold">Payment methods</legend>
                        <div  class="row my-2">
                            <div class="col">
                               <div class="payment_method d-flex align-items-center checked pointer">
                                   <div class="form-check">
                                       <input class="form-check-input method el" key_clmn="method" type="radio" name="payment_type" checked="true" value="COD">
                                       <label class="form-check-label" for="method-cod">
                                           COD
                                       </label>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div  class="row my-2">
                            <div class="col">
                                <div class="payment_method d-flex align-items-center pointer">
                                    <div class="form-check">
                                        <input class="form-check-input method" type="radio" name="payment_type"  value="card">
                                        <label class="form-check-label" for="method-cod">
                                           <i fa fa-credit-card></i>Visa card/ Credit card/ JCB
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!------------left------------>
            <div class="col-md-5 col-xs-12 col-sm-12 py-2">
                <div class="row ps-4">
                    <div class="col" id="show-cart">

                    </div>
                </div>
                <div class="row mt-4 ps-4">
                    <div class="col discount-bg" style="height: 100px!important;">
                        <div class="row justify-content-center h-100 ">
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
                                        <span class="f-14 c-20c997">${{number_format($item->discount_amount,2) }}  discount for orders with total amount greater than ${{number_format($item->app_total,2) }}</span>
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
                    <div class="col-md-12 f-16 bold">Discount code<span class="discount-valid hidden-cls text-danger f-13">(is invalid)</span></div>
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
                        <button class="btn btn-success form-control btn-pay-now bold" >Pay now</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/cart.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/common.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/payment/payment.js"></script>

<script>
    $(document).ready(function(){
        $('#p-cart .shipment_phone').inputmask('(999)999-9999');
    });
</script>

@endsection


