@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar produto</h1>
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
                    <form method="POST" action="{{ route('admin.products.update', [$product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('admin/products/create.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('admin/products/create.description') }}</label>
                            <input class="form-control" type="text-area" name="description" id="description" value="{{ $product->description }}">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">{{ __('admin/products/create.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ $product->price }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('admin/products/create.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('admin/products/create.category') }}</label>
                            <select class="form-control" name="category_id" id="category">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image[]" onchange="preview()" multiple>
                            <label class="custom-file-label" for="customFile">{{ __('admin/products/create.images') }}</label>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-start mb-2 products_images">
                            
                        </div>

                        <label for="">Imagens salvas</label>
                        <div class="d-flex justify-content-start mb-2">
                            @if(sizeof($product->images) != 0)
                                @foreach($product->images as $image)
                                    
                                    <div class="d-flex flex-column">
                                        <i style="cursor: pointer;" class="fa fa-trash mb-2"></i>
                                        <img class="mr-4" width="200px" height="200px" src="{{ url($image->image) }}" alt="image">
                                    </div>
                                
                                @endforeach
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('admin/products/create.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <script>
        function preview() {
            //console.log(event.target.files)
            let imageDiv = ``
            
            for(let i = 0; i < event.target.files.length; i++) {
                let imageDiv = `
                    <div class="d-flex flex-column img_div_${i}">
                        <i onclick="clearImage('img_div_${i}', ${i})" style="cursor: pointer;" class="fa fa-trash mb-2"></i>
                        <img class="mr-4 img_${i}" width="200px" height="200px" alt="image">
                    </div>
                `

                $('.products_images').append(imageDiv)

                $(`.img_${i}`).attr('src', URL.createObjectURL(event.target.files[i]))
            }
        }

        function clearImage(imgClass, arrPosition) {
            let toRemove = $(`.${imgClass}`)
            
            let imgs = $('#customFile')[0].files

            toRemove.remove()
        }
    </script>
@endsection
