@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>MAIS RECENTES</h3>
    </div>
    <div class="latest_products_container">
        @foreach($latest_products as $product)
            <div class="product_card">
                <img src="{{ $product->images[0]->image }}" alt="" srcset="">
                <h5>{{ $product->name }}</h5>
                <h6>R${{ $product->price }}</h6>
            </div>
        @endforeach
    </div>
</div>
@endsection
