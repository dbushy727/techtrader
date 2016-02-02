<div class="panel panel-default product_panel">
    <div class="panel-heading product_title">{{ $product->title }}</div>
    <div class="panel-body product_body">
        @foreach ($product->categories as $category)
            <span class="label category_label"><i class="{{ $category->icon }} fa-2x"></i></span>
        @endforeach
        <span class="label {{ $product->condition->color }} condition_label" >{{$product->condition->name}}</span>
        <img src="{{ $product->primaryImage->path}}" class="img-responsive product_primary_image">
        <div class="product_description">
            <div class="form-group">
                <label>Brand: </label>
                {{ $product->brand }}
            </div>
            <div class="form-group">
                <label>Description:</label>
                <div>{{ $product->basic_description }}</div>
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