@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-ad-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        @can('create', \App\Models\User::class)
                            <div class="mb-3">
                                 <a href="{{ route('user.create') }}" class="btn btn-sm btn-success" role="button">Add new user</a>
                            </div>
                        @endcan
                        {!! $grid->show() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
