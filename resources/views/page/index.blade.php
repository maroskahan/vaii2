@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-ad-12">
                <div class="card">
                    <div class="card-header">{{ __('Pages') }}</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('page.create') }}" class="btn btn-sm btn-success" role="button">Add new page</a>
                        </div>
                        {!! $grid->show() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
