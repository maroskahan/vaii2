
@extends('layouts.admin')

@section('content')
                <div class="card">
                    <div class="card-header">{{ __('Stránky') }}</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('page.create') }}" class="btn btn-sm btn-success" role="button">Pridať novú stránku</a>
                        </div>
                        {!! $grid->show() !!}
                    </div>
                </div>
@endsection
