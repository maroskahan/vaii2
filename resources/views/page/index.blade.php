@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-ad-12">
                <div class="card">
                    <div class="card-header">{{ __('Pages') }}</div>
                    <div class="card-body">
                        {!! $grid->show() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
