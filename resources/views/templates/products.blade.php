<div class="col-sm-12">
    <div class="col-sm-6 text-left">
        {!! $products->render() !!}
    </div>
    <div class="col-sm-3 col-sm-offset-3 text-right">
        <select class="form-control sort_products" name="sort">
            <option value="price_low_high">Price Low-to-High</option>
            <option value="price_high_low">Price High-to-Low</option>
            <option value="rating">Rating</option>
            <option value="newest">Newest</option>
            <option value="oldest">Oldest</option>
        </select>
    </div>
</div>
<div class="col-sm-12">
    <div class="row">
    @foreach ($products as $index => $product)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel panel-default product_panel">
                <div class="panel-heading product_title">{{ $product->title }}</div>
                <div class="panel-body product_body">
                    @foreach ($product->categories as $category)
                        <span class="label label-info category_label">{{ $category->name }}</span>
                    @endforeach
                    <span class="label label-warning condition_label">{{$product->condition->name}}</span>
                    <img src="/assets/img/bear.jpeg" alt="" class="img-responsive product_primary_image">
                    <div class="product_description">
                        <div>
                            {{ $product->description }}
                        </div>
                        <div class="created_time">
                            Posted: {{ $product->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                        <label><span class="money_symbol">$</span>{{ $product->price }}</label>
                        @if(Auth::user() == $product->user)
                        <a href="/products/{{$product->id}}/edit"><button class="btn btn-warning btn-xs pull-right">Edit</button></a>
                        @else
                        <a href="/products/{{$product->id}}"><button class="btn btn-primary btn-xs pull-right">View</button></a>
                        @endif
                </div>
            </div>
        </div>
        @if (($index + 1) % 3 == 0)
            </div>
            <div class="row">
        @endif
    @endforeach
</div>
<div class="col-sm-6 text-left">
    {!! $products->render() !!}
</div>