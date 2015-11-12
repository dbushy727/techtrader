@extends('app')

@section('content')
<div class="container" ng-controller="UserProductController">
<h2>My Products</h2>
@include('templates.products')
</div>
@endsection