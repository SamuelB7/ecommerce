@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('admin/users/index.users_list') }}</h1>
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
                        <th>{{ __('admin/users/index.name') }}</th>
                        <th>{{ __('admin/users/index.email') }}</th>
                        <th>{{ __('admin/users/index.role') }}</th>
                        <th>{{ __('admin/users/index.actions') }}</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ $user->role }}</td>
                            <td class="d-flex justify-content-around align-middle">
                                <a href="{{ route('admin.users.show', [$user->id]) }}" class="btn btn-light">{{ __('admin/users/index.details') }}</a>
                                <a href="{{ route('admin.users.edit', [$user->id]) }}" class="btn btn-light">{{ __('admin/users/index.edit') }}</a>
                                <form style="margin: 0;" method="POST" action="{{ route('admin.users.destroy', [$user->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">{{ __('admin/users/index.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
