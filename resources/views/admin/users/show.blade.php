@extends('layouts.app')

@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    </div>
</div>
@endsection
