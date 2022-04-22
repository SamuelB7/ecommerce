@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('admin/products/show.products_detail') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row gx-1">
                <div class="col">
                    <h4>Nome</h4>
                    <h5>{{ $product->name }}</h5>
                </div>
                <div class="col">
                    <h4>Preço</h4>
                    <h5>R${{ $product->price }}</h5>
                </div>
                <div class="col">
                    <h4>Quantidade disponível</h4>
                    <h5>{{ $product->quantity }}</h5>
                </div>
                <div class="col">
                    <h4>Categoria</h4>
                    <h5>{{ $product->category->name }}</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div>
                        <h4>Descrição do produto</h4>
                        <h5>{{ $product->description }}</h5>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-start">
                @if(sizeof($product->images) != 0)
                    @foreach($product->images as $image)
                        
                        <img width="250px" height="250px" src="{{ $image->image }}" alt="image">
                    
                    @endforeach
                @endif
            </div>
            <hr>
            <div class="d-flex justify-content-start">
                <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-warning mr-2">Editar</a>
                <form style="margin: 0;" method="POST" action="{{ route('products.destroy', [$product->id]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection