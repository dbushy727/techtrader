@extends('app')

@section('content')
<h2 class="text-center">Post A Product</h2>
        <div class="col-sm-6 col-sm-offset-3 create_product">
            {!! Form::open(['method' => 'POST', 'route' => 'products.store', 'class' => 'form-horizontal']) !!}

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

                <div class="btn-group pull-right">
                    {!! Form::reset("Clear", ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit("Post", ['class' => 'btn btn-success']) !!}
                </div>


            {!! Form::close() !!}
        </div>
@endsection