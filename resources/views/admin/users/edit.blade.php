@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Usuário</h1>
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
                <form method="post" action="{{ route('admin.users.update', [$user->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">{{ __('admin/users/create.name') }}</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('admin/users/create.email') }}</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('admin/users/create.password') }}</label>
                        <input class="form-control" type="password" name="password" id="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">{{ __('admin/users/create.role') }}</label>
                        <select class="form-control" name="role" id="role">
                            <option @if($user->role == 'admin') selected @endif value="admin">Admin</option>
                            <option @if($user->role == 'agent') selected @endif value="agent">Agent</option>
                            <option @if($user->role == 'customer') selected @endif value="customer">Customer</option>
                        </select>
                        @error('role')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary">{{ __('admin/users/create.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection