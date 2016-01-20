@extends('app')

@section('content')
    <div class="col-sm-12 create_product">
        @if(!$product->id)
            {!! Form::model($product, ['route' => 'products.store', 'class' => 'form_submit']) !!}
        @else
            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'class' => 'form_submit']) !!}
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">Listing Information</div>
            <div class="panel-body">
                <div class="col-sm-6">
                    <div class="form-group @if($errors->first('title')) has-error @endif">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group @if($errors->first('price')) has-error @endif">
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group @if($errors->first('category')) has-error @endif">
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::select('category', $categories, null, ['id' => 'category', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('category') }}</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group @if($errors->first('condition')) has-error @endif">
                        {!! Form::label('condition', 'Condition') !!}
                        {!! Form::select('condition', $conditions, null, ['id' => 'condition', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('condition') }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Product Information</div>
            <div class="panel-body">
                <div class="col-sm-6">
                    <div class="form-group @if($errors->first('brand')) has-error @endif">
                        {!! Form::label('brand', 'Brand') !!}
                        {!! Form::text('brand', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('brand') }}</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group @if($errors->first('model_number')) has-error @endif">
                        {!! Form::label('model_number', 'Model Number') !!}
                        {!! Form::text('model_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('model_number') }}</small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group @if($errors->first('description')) has-error @endif">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'description']) !!}
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                        <script>CKEDITOR.replace( 'description' );</script>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="panel panel-default">
            <div class="panel-heading">Images</div>
            <div class="panel-body">
                <div class="product_images">
                    @foreach ($product->images as $image)
                        <div class="product_image">
                            <img class="img-responsive img-rounded image_thumb" src={{ $image->path }}>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if($product->id)
        {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-danger pull-right">Delete</button>
        {!! Form::close() !!}
        @endif
        {!! Form::submit("Submit", ['class' => 'btn btn-success btn-xl submit']) !!}
    </div>
@endsection