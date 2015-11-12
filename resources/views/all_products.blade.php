@extends('app')

@section('content')
<div ng-controller="ProductController">
<h2>All Products</h2>
@include('templates.products')
</div>
@endsection