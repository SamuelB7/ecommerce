@extends('layouts.app')

@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">Create new user</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input class="form-control" type="email" name="email" id="email" required>
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
                                <option value="admin">Admin</option>
                                <option value="agent">Agent</option>
                                <option value="customer">Customer</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
