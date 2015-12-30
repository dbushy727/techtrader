@extends('app')

@section('content')
    <div class="col-sm-6 col-sm-offset-3 create_product">

        @if(!$product->id)
            {!! Form::model($product, ['route' => 'products.store']) !!}
        @else
            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
        @endif

        <div class="form-group @if($errors->first('title')) has-error @endif">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>

        <div class="form-group @if($errors->first('description')) has-error @endif">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>

        <div class="form-group @if($errors->first('price')) has-error @endif">
            {!! Form::label('price', 'Price') !!}
            {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>

        <div class="form-group @if($errors->first('category')) has-error @endif">
            {!! Form::label('category', 'Category') !!}
            {!! Form::select('category', $categories, null, ['id' => 'category', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('category') }}</small>
        </div>

        <div class="form-group @if($errors->first('condition')) has-error @endif">
            {!! Form::label('condition', 'Condition') !!}
            {!! Form::select('condition', $conditions, null, ['id' => 'condition', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('condition') }}</small>
        </div>

        <div class="product_images">
                @foreach ($product->images as $image)
                    <div class="product_image">
                        <img class="img-responsive img-rounded image_thumb" src={{ $image->path }}>
                    </div>
                @endforeach
        </div>

        <div class="btn-group pull-right">
            {!! Form::reset("Reset", ['class' => 'btn btn-danger']) !!}
            {!! Form::submit("Submit", ['class' => 'btn btn-success']) !!}
        </div>

    </div>
@endsection