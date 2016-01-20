@extends('app')

@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-8">
            <h2>{{ $product->title }} <span class="pull-right">${{$product->price}}</span></h2>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-8 product_information">
            <div class="panel panel-default">
                <div class="panel-body product_body">
                    <img src="/assets/img/bear.jpeg" alt="" class="img-responsive product_primary_image">
                    <div class="product_description">
                        <div>
                            {!! $product->description !!}
                        </div>
                        <div class="created_time">
                            Posted: {{ $product->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 seller_information">
            <div class="panel panel-primary">
                <div class="panel-heading">Buy</div>
                <div class="panel-body">
                    <div class="form-group seller">
                        <label>Seller:</label>
                        <div>{{ $product->user->name }}</div>
                    </div>
                    <div class="form-group condition">
                        <label>Condition:</label>
                        <div>
                            <span class="label label-warning condition_label">{{ $product->condition->name }}</span>
                        </div>
                    </div>
                    <div class="form-group categories">
                        @if(count($product->categories) == 1)
                        <label>Category:</label>
                        @else
                        <label>Categories:</label>
                        @endif
                        <div>
                            @foreach($product->categories as $category)
                                <span class="label label-info category_label">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group shipping_methods">
                        <label>Available Delivery Methods:</label>
                        <div>
                            Pick-Up, USPS, FedEx
                        </div>
                    </div>
                    <div class="form-group price">
                        <label>Price:</label>
                        <div>${{$product->price}}</div>
                    </div>
                    <div class="text-right">
                        <form action="/cart/add/{{$product->id}}" method="POST">
                            <button class="btn btn-primary btn-xl">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="photos col-sm-12">
            <h4>Photos</h4>
            <div class="product_images panel panel-default">
                <div class="panel-body">
                    @foreach ($product->images as $image)
                        <div class="product_image">
                            <img class="img-responsive img-rounded" src={{ $image->path }}>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection