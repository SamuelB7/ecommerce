@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <img class="main_image" width="500px" height="500px" src="{{ url($product->images[0]->image) }}" alt="" srcset="">
        </div>
        <div class="col">
            <h3>{{ $product->name }}</h3>
            <h5>R$ {{ $product->price }}</h5>
            <p>{{ $product->description }}</p>
            <div class="d-flex gap-2">
                <form class="d-flex align-items-center gap-2" action="">
                    <label class="m-0" for="quantity_bought">Quantidade</label>
                    <input style="width: 4rem;" type="number" class="form-control" name="quantity_bought" id="quantity_bought" value="1">
                    <button type="submit" class="btn btn-success">COMPRAR</button>
                </form>
                <button class="btn btn-primary">ADICIONAR AO CARRINHO</button>
            </div>
        </div>
    </div>
    <div class="row row-cols-auto mt-2">
        @foreach($product->images as $image)
            <div class="col">
                <img onclick="changeImage('{{ url($image->image) }}')" width="200px" height="200px" class="img-thumbnail" src="{{ url($image->image) }}" style="cursor: pointer;">
            </div>
        @endforeach
    </div>
</div>

<script>
    function changeImage(imageUrl) {
        $('.main_image').attr('src', imageUrl)
    }
</script>
@endsection
