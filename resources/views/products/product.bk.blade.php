
@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="card bg-white">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
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
            @if(isset($product))
            <form class="form-white" action="{{ route('product.update', $prd_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @else
            <form class="form-white" action="{{ url('product') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            @endif

                <div class="row">

                    <!----------left----------->
                    <div class="col-6 col-ms-12 col-xs-12 ">
                        <div class="row my-2">
                            <div class="col">

                                <label>Batch code</label>
                                <input type="text" disabled="true" class="form-control" name="prd_batch_code" id="prd_batch_code" value="{{$prd_batch_code}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Product name</label>
                                <input type="text" class="form-control" name="prd_name" id="prd_name" value="{{$prd_name}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Product Quantity</label>
                                <input type="number" class="form-control" name="prd_quantity" id="prd_quantity" value="{{$prd_quantity}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Product Regular Price</label>
                                <input type="text" class="form-control input-currency" name="prd_regular_price" id="prd_regular_price" value="{{$prd_regular_price}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Description</label>
                                <textarea rows="4"  class="form-control" name="prd_disctiption" id="prd_disctiption">{{$prd_disctiption}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!----------right----------->
                    <div class="col-6 col-ms-12 col-xs-12 ">
                        <div class="row my-2">
                            <div class="col">
                                <label>Product type</label>
                                <select class="form-control" name="prd_type" id="prd_type"></select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Product SKU</label>
                                <input type="text" class="form-control" name="prd_sku" id="prd_sku" value="{{$prd_sku}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Tags<span class="f-10">(separated by ',')</span></label>
                                <input type="text" class="form-control" name="prd_tag" id="prd_tag" value="{{$prd_tag}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Product Price</label>
                                <input type="text" class="form-control input-currency" name="prd_price" id="prd_price" value="{{$prd_price}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label>Short description</label>
                                <textarea rows="4" class="form-control" name="prd_short_disctiption" id="prd_short_disctiption">{{$prd_short_disctiption}}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <fieldset class="border p-4">
                    <legend class="float-none w-auto f-16 bold">Product attributes</legend>
                    <div class="row -mt-15">
                        <!------------left------------>
                        <div class="col-6 col-ms-12 col-xs-12 ">
                            <div class="row">
                                <div class="col">
                                    <label>Product for Sex</label>
                                    <div class="row">
                                       <div class="col">
                                           <div class="form-check form-check-inline">
                                               @if($prd_sex=="male")
                                                  @php $checked = 'checked="checked"'; @endphp
                                               @else
                                               @php $checked = ''; @endphp
                                               @endif

                                               <input class="form-check-input" type="radio" name="prd_sex" <?=$checked?> value="male">
                                               <label class="form-check-label" for="prd_sex">Male</label>
                                           </div>
                                           <div class="form-check form-check-inline">
                                               @if($prd_sex=="female")
                                               @php $checked = 'checked="checked"'; @endphp
                                               @else
                                               @php $checked = ''; @endphp
                                               @endif
                                               <input class="form-check-input" type="radio" name="prd_sex" value="female" <?=$checked?>>
                                               <label class="form-check-label" for="prd_sex">Female</label>
                                           </div>
                                           <div class="form-check form-check-inline">
                                               @if($prd_sex=="unknown")
                                               @php $checked = 'checked="checked"'; @endphp
                                               @else
                                               @php $checked = ''; @endphp
                                               @endif
                                               <input class="form-check-input" type="radio" name="prd_sex"  value="unknown" <?=$checked?>>
                                               <label class="form-check-label" for="prd_sex">Unknown</label>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Product specific size</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check form-check-inline">
                                                @if($prd_size=="S")
                                                @php $checked = 'checked="checked"'; @endphp
                                                @else
                                                @php $checked = ''; @endphp
                                                @endif
                                                <input class="form-check-input" type="radio" name="prd_size"  value="S" {{$checked}}>
                                                <label class="form-check-label" for="prd_size">Small</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                @if($prd_size=="M")
                                                @php $checked = 'checked="checked"'; @endphp
                                                @else
                                                @php $checked = ''; @endphp
                                                @endif
                                                <input class="form-check-input" type="radio" name="prd_size" value="M" {{$checked}}>
                                                <label class="form-check-label" for="prd_size">Medium</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                @if($prd_size=="X")
                                                @php $checked = 'checked="checked"'; @endphp
                                                @else
                                                @php $checked = ''; @endphp
                                                @endif
                                                <input class="form-check-input" type="radio" name="prd_size" value="X" {{$checked}}>
                                                <label class="form-check-label" for="prd_size">Lager</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                @if($prd_size=="XL")
                                                @php $checked = 'checked="checked"'; @endphp
                                                @else
                                                @php $checked = ''; @endphp
                                                @endif
                                                <input class="form-check-input" type="radio" name="prd_size"  value="XL" {{$checked}}>
                                                <label class="form-check-label" for="prd_size">Xlager</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Product specific color</label>
                                    <input type="text" disabled="true" class="form-control" name="prd_color" id="prd_color" value="{{$prd_color}}">
                                </div>
                            </div>

                        </div>
                        <!------------right------------>
                        <div class="col-6 col-ms-12 col-xs-12 ">
                            <div class="row">
                                <div class="col">
                                    <label>Sexes</label>
                                    <div class="row">
                                        <?php
                                        $male = '';
                                        $female = '';
                                        $unknown = '';
                                            if($multi_sexes !=""){
                                                if(strpos($multi_sexes,",")){
                                                    $expl = explode(",",$multi_sexes);
                                                    foreach($expl as $key){
                                                        $key = trim($key);
                                                        if($key=="male"){
                                                            $male = 'checked="checked"';
                                                        }elseif($key=="female"){
                                                            $female = 'checked="checked"';
                                                        }elseif($key=="unknown"){
                                                            $unknown = 'checked="checked"';
                                                        }
                                                    }
                                                }else{
                                                    $key = trim($multi_sexes);
                                                    if($key=="male"){
                                                        $male = 'checked="checked"';
                                                    }elseif($key=="female"){
                                                        $female = 'checked="checked"';
                                                    }elseif($key=="unknown"){
                                                        $unknown = 'checked="checked"';
                                                    }
                                                }
                                            }
                                        ?>
                                        <div class="col">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_male" id="prd-male" value="male" {{$male}}>
                                                <label class="form-check-label" for="prd-male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_female" id="prd-female" value="female" {{$female}}>
                                                <label class="form-check-label" for="prd-male">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_unknown" id="prd-unknown" value="unknown" {{$unknown}}>
                                                <label class="form-check-label" for="prd-unknown">Unknown</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <?php
                                $s = '';
                                $m = '';
                                $x = '';
                                $xl = '';
                                if($multi_sizes !=""){
                                    if(strpos($multi_sizes,",")){
                                        $expl = explode(",",$multi_sizes);
                                        foreach($expl as $key){
                                            $key = trim($key);
                                            if($key=="S"){
                                                $s = 'checked="checked"';
                                            }elseif($key=="X"){
                                                $x = 'checked="checked"';
                                            }elseif($key=="M"){
                                                $m = 'checked="checked"';
                                            }elseif($key=="XL"){
                                                $xl = 'checked="checked"';
                                            }
                                        }
                                    }else{
                                        $key = trim($multi_sizes);
                                        if($key=="S"){
                                            $s = 'checked="checked"';
                                        }elseif($key=="X"){
                                            $x = 'checked="checked"';
                                        }elseif($key=="M"){
                                            $m = 'checked="checked"';
                                        }elseif($key=="XL"){
                                            $xl = 'checked="checked"';
                                        }
                                    }
                                }
                                ?>
                                <div class="col">
                                    <label>Product sizes</label>
                                    <div class="row">
                                        <input type="hidden" name="multi_sizes" id="multi_sizes">
                                        <div class="col">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_small" id="prd-small" value="S" {{$s}}>
                                                <label class="form-check-label" for="prd-male">Small</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_medium" id="prd-medium" value="M" {{$m}}>
                                                <label class="form-check-label" for="prd-male">Medium</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_x" id="prd-x" value="X" {{$x}}>
                                                <label class="form-check-label" for="prd-unknown">Lager</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="prd_xl" id="prd-xl" value="XL" {{$xl}}>
                                                <label class="form-check-label" for="prd-unknown">XLager</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col library-images">
                                    <label>Product colors<span class="f-10">(separated by ',')</span></label>
                                    <input type="text" readonly="true" class="form-control prd-img-btn prd-library" name="multi_colors" id="multi_colors" value="{{$multi_colors}}">
                                </div>
                            </div>
                        </div>

                    </div>
                </fieldset>
                <fieldset class="border p-4 my-2">
                    <legend class="float-none w-auto f-16 bold">Image</legend>
                    <div class="row -mt-15">
                        <div class="col-6 col-ms-12 col-xs-12">
                            <label class="col-12">Product image</label>
                            <div class="input-group mb-3 col-2 product-image">
                                <input type="text" class="form-control" readonly="true" name="prd_img" id="prd_img" value="{{$prd_img}}">
                                <span class="btn btn-primary prd-img-btn" style="cursor: pointer">Select file</span>
                            </div>
                        </div>
                        <div class="col-6 col-ms-12 col-xs-12">
                            <div class="form-group col-12">
                                <label  for="library-area">Library</label>
                                <div class="input-group mb-3 col-2 library-images">
                                    <input type="text" class="form-control prd-library" readonly="true" name="prd_library" id="prd_library" value="{{$prd_library}}">
                                    <span class="btn btn-primary prd-img-btn" style="cursor: pointer">Select files</span>
                                </div>
                                <!------ !-->
                            </div>

                        </div>
                    </div>
                </fieldset>
            <div class="row justify-content-md-center">
                <div class="col-md-1 col-xs-6 col-sm-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-md-1 col-xs-6 col-sm-6">
                    <button class="btn btn-secondary">Cancel</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>const js_prd_type_name = {{ Js::from($prd_type_name) }};</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/product/product.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/library_images.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/common.js"></script>

@endsection


