@extends('layouts.app')

@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content">
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
                            <td>
                                <a href="{{ route('show_user', [$user->id]) }}" class="btn btn-light">{{ __('admin/users/index.details') }}</a>
                                <a href="{{ route('edit_user', [$user->id]) }}" class="btn btn-light">{{ __('admin/users/index.edit') }}</a>
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
