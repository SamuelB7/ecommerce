@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('admin/products/create.product_create') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('admin/products/create.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('admin/products/create.description') }}</label>
                            <input class="form-control" type="text-area" name="description" id="description" required>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">{{ __('admin/products/create.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" required>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('admin/products/create.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" required>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('admin/products/create.category') }}</label>
                            <select class="form-control" name="category_id" id="category" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image[]" multiple>
                            <label class="custom-file-label" for="customFile">{{ __('admin/products/create.images') }}</label>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('admin/products/create.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
