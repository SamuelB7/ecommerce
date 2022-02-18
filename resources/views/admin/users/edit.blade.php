@extends('layouts.app')

@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-header">Edit user page</div>
            <div class="card-body">
                <p>This is edit user page</p>
                <p>{{$user->name}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
