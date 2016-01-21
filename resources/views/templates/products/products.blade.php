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
            @include('templates.products.product_card')
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