@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('admin/categories/index.categories_list') }}</h1>
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
                        <th>{{ __('admin/categories/index.id') }}</th>
                        <th>{{ __('admin/categories/index.name') }}</th>
                        <th>{{ __('admin/categories/index.actions') }}</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="align-middle">{{ $category->id }}</td>
                            <td class="align-middle">{{ $category->name }}</td>
                            <td class="d-flex align-middle">
                                <a href="" class="btn btn-light mr-2">{{ __('admin/categories/index.edit') }}</a>
                                <form style="margin: 0;" method="POST" action="">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">{{ __('admin/users/index.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
