@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to my page.') }}
                </div>


                    @if(Auth::user()!=null)
                            <div class="mb-2 mt-2 align-self-center">
                                <a href="{{ route('article.create') }}" class="btn btn-sm btn-success" role="button">Add new article</a>
                            </div>
                    @endif



                @forelse($articles->reverse()  as $article)
                    <div class="card mt-5">
                        @if($article->img_url!=null)
                            <img class="card-img-top" src="{{ $article->img_url }}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <h6 class="card-title text-muted">{{ \App\Models\User::find($article->user_id)->name }}</h6>
                            <p class="card-text">{{$article->text}}</p>
                            <p class="card-text">{{$article->updated_at->diffForHumans()}}</p>
                        </div>
                        @if(Auth::user()!=null)
                            @if(Auth::user()->can('create', $article))
                                <a href="{{ route('article.edit', [$article->id]) }}" title="Edit" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('article.delete', [$article->id]) }}" title="Delete" data-method="DELETE" class="btn btn-sm btn-danger" data-confrim="Are you sure?">Delete</a>
                            @endif
                        @endif
                    </div>
                @empty
                    <p>There are no articles!</p>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
