
@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="card bg-white">
        <div class="card-header text-right">
            <a href="{{ route('product.add') }}">
                <button type="button" class="btn btn-info">Add Product</button>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th>#</th>
                    <th >Image</th>
                    <th>Name</th>
                    <th >Type</th>
                    <th >Sex</th>
                    <th>Regular Price</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($products)>0)
                    @php $i=0; @endphp
                    @foreach($products as $product)
                        @php $i++; @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td><img src="{{ URL::to('/') }}/images/{{$product->prd_img}}" style="width: 50px!important" class="d-block w-100" alt="Anh Ho"></td>
                            <td>{{$product->prd_name}}</td>
                            <td>{{$product->prd_type_name}}</td>
                            <td>{{$product->prd_sex}}</td>
                            <td>${{number_format($product->prd_regular_price, 0, '.', ',')}}</td>
                            <td>${{number_format($product->prd_price, 0, '.', ',')}}</td>
                            <td>{{$product->prd_quantity}}</td>
                            <td><a href="{{ route('products.edit',['prd_id' => $product->prd_id]) }}"><button type="button" class="btn btn-info">Edit</button></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No data found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection


