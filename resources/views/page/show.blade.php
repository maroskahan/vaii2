@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-ad-12">
                <div class="card pl-5 pt-5 pr-5 pb-5">
                    <div class="card-body">
                    <h1>{{ $page->title }}</h1>
                    <h6 class="card-title text-muted bg-light">Author: {{ \App\Models\User::find($page->user_id)->name }}</h6>
                    <p class="card-text bg-light">{{$page->updated_at->diffForHumans()}}</p>
                    <p class="card-text">{!! $page->text !!}</p>
                        <br>
                        <a href="{{ route('page.edit', [$page->id])  }}" title="Edit" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('page.delete', [$page->id]) }}" title="Delete" data-method="DELETE" class="btn btn-sm btn-danger">Delete</a>
                        @if ($page->published)
                        <a href="{{ route('page.publish', [$page->id]) }}" title="Hide" class="btn btn-sm btn-secondary">Hide</a>
                        @else
                        <a href="{{ route('page.publish', [$page->id]) }}" title="Publish" class="btn btn-sm btn-secondary">Publish</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
