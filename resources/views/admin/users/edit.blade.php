@extends('layouts.app')

@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-header">Edit user page</div>
            <div class="card-body">
                <form method="PUT" action="{{ route('users.update', [$user->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role"></label>
                        <select class="form-control" name="role" id="role" required>
                            <option @if($user->role == 'admin') selected @endif value="admin">Admin</option>
                            <option @if($user->role == 'agent') selected @endif value="agent">Agent</option>
                            <option @if($user->role == 'customer') selected @endif value="customer">Customer</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
