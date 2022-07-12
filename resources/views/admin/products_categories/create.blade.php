@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar nova categoria de produto</h1>
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
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                            @error('name')
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
