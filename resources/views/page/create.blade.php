@extends('layouts.admin')

@section('content')
                <div class="card">
                    <div class="card-header">{{ __('Pridat novu stranku.') }}</div>
                    <div class="card-body">
                        @include('page.form')
                    </div>
                </div>
@endsection
