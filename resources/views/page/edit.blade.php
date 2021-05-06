@extends('layouts.admin')

@section('content')
                <div class="card">
                    <div class="card-header">{{ __('Upravit stranku.') }}</div>
                    <div class="card-body">
                        @include('page.form')
                    </div>
                </div>
@endsection
