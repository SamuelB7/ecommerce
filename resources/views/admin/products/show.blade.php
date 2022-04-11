@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detalhes do usuário</h1>
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
        <div class="card-header">User detail page</div>
        <div class="card-body">
            <div>
                <h5>Nome</h5>
                <p>{{ $user->name }}</p>
            </div>
            <div>
                <h5>Email</h5>
                <p>{{ $user->email }}</p>
            </div>
            <div>
                <h5>Função</h5>
                <p>{{ $user->role }}</p>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection