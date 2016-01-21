@extends('app')

@section('content')
<div class="col-sm-12">
    <h2>Categories</h2>
    @foreach($categories as $category)
    <div class="col-sm-4 text-center category_box">
        <div class="panel panel-default">
            <div class="panel-body">
                {{ $category }}
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="col-sm-12">
    <h2>Latest Products</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach($products as $index => $product)
                <div class="col-sm-3">
                    @include('templates.products.product_card')
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection