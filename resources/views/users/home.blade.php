@extends('app')

@section('content')
<div class="col-sm-12">
    @foreach($categories as $category)
    <div class="col-sm-4 col-xs-6 text-center category_box">
        <div class="panel panel-default">
            <div class="panel-body">
                <i class="{{ $category->icon }} fa-2x"></i>
                <div>{{ $category->name }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="col-sm-12">
    <h2>Latest Products</h2>
    @foreach($products as $index => $product)
        <div class="col-md-3 col-sm-4 col-xs-6">
            @include('templates.products.product_card')
        </div>
    @endforeach
</div>
@endsection