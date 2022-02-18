@extends('layouts.app')

@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-header">User detail page</div>
            <div class="card-body">
                <p>This is user detail page</p>
                <p>{{$user->name}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
