@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()!=null)
                <div class="align-self-center">
                    <a href="{{ route('article.create') }}" class="btn btn-lg btn-dark" role="button">Add new article</a>
                </div>
            @endif
            <div class="card">

                @if (session('status'))
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                     </div>
                @endif






                @forelse($articles->reverse()  as $article)
                    <div class="card mt-10 mb-10">
                        @if($article->img_url!=null)
                            <img class="card-img-top" src="{{ $article->img_url }}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <h6 class="card-title text-muted">Author: {{ \App\Models\User::find($article->user_id)->name }}</h6>
                            <p class="card-text">{!!  $article->text !!}</p>
                            <p class="card-text bg-light">{{$article->updated_at->diffForHumans()}}</p>
                        </div>
                        @if(Auth::user()!=null)
                            @if(Auth::user()->can('create', $article))
                                <a href="{{ route('article.edit', [$article->id]) }}" title="Edit" class="btn btn-sm btn-light">Edit</a>
                                <a href="{{ route('article.delete', [$article->id]) }}" title="Delete" data-method="DELETE" class="btn btn-sm btn-dark" data-confrim="Are you sure?">Delete</a>
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
