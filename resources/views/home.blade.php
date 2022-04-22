@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(isset($latest_products))
        <div class="d-flex justify-content-center">
            <h3>{{ __('pages/home.recent_products') }}</h3>
        </div>
        <div class="latest_products_container">
            @foreach($latest_products as $product)
                <div class="product_card">
                    <a href="{{ route('products.show', [$product->id]) }}">
                        <img src="{{ $product->images[0]->image }}" alt="" srcset="">
                        <h5>{{ $product->name }}</h5>
                        <h6>R${{ $product->price }}</h6>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    @if(isset($searched_products))
        <div class="d-flex justify-content-center">
            <h3>{{ __('pages/home.search_results') }}</h3>
        </div>
        <div class="products_container">
            @foreach($searched_products as $product)
                <div class="product_card">
                    <a href="{{ route('products.show', [$product->id]) }}">
                        <img src="{{ $product->images[0]->image }}" alt="" srcset="">
                        <h5>{{ $product->name }}</h5>
                        <h6>R${{ $product->price }}</h6>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $searched_products->withQueryString()->links('pagination::bootstrap-4') }}
    @endif
</div>
@endsection
