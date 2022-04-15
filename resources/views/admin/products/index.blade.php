@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('admin/products/index.products_list') }}</h1>
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
                <table class="table">
                    <thead>
                        <th>{{ __('admin/products/index.id') }}</th>
                        <th>{{ __('admin/products/index.name') }}</th>
                        <th>{{ __('admin/products/index.price') }}</th>
                        <th>{{ __('admin/products/index.quantity') }}</th>
                        <th>{{ __('admin/products/index.category') }}</th>
                        <th>{{ __('admin/products/index.actions') }}</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="align-middle">{{ $product->id }}</td>
                            <td class="align-middle">{{ $product->name }}</td>
                            <td class="align-middle">R${{ $product->price }}</td>
                            <td class="align-middle">{{ $product->quantity }}</td>
                            <td class="align-middle">{{ $product->category->name }}</td>
                            <td class="d-flex justify-content-around align-middle">
                                <a href="{{ route('products.show', [$product->id]) }}" class="btn btn-light">{{ __('admin/products/index.details') }}</a>
                                <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-light">{{ __('admin/products/index.edit') }}</a>
                                <form style="margin: 0;" method="POST" action="{{ route('products.destroy', [$product->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">{{ __('admin/users/index.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
