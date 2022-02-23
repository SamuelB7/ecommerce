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
            <div class="card-header">{{ __('admin/users/index.users_list') }}</div>
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
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-light p-2">{{ __('admin/users/index.details') }}</a>
                                <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-light">{{ __('admin/users/index.edit') }}</a>
                                <form style="margin: 0;" method="POST" action="{{ route('users.destroy', [$user->id]) }}">
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
    </div>
</div>
@endsection
