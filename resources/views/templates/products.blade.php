<div class="col-sm-12 text-right">
    {!! $products->render() !!}
</div>
@foreach ($products as $product)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="panel panel-default product_panel">
            <div class="panel-heading"><strong>{{ $product->title }}</strong></div>
            <div class="panel-body product_body">
                <img src="http://placebear.com/230/230" alt="" class="img-rounded img-responsive product_image">
                <div class="created_time">
                    Posted: {{ $product->created_at }}
                </div>
            </div>
            <div class="panel-footer">
                    <label>{{ $product->price }}</label>
                    <button class="btn btn-primary btn-xs pull-right">View</button>
            </div>
        </div>
    </div>
@endforeach
<div class="col-sm-12 text-right">
    {!! $products->render() !!}
</div>