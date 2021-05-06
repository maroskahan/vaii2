@extends('layouts.admin')

@section('content')
                <div class="card">
                    <div class="card-header">{{ __('Add new user') }}</div>
                    <div class="card-body">
                        @include('user.form')
                    </div>
                </div>
@endsection
