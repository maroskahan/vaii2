<?php
    use Carbon\Carbon;
    Carbon::setLocale('sk');
?>

@extends('layouts.app')


    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card" style="background: transparent;">

                    @if (session('status'))
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                         </div>
                    @endif

                        <div id="carouselExampleIndicators" class="carousel slide mb-2 shadow p-2 mb-3 bg-black rounded" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner ">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('img/budova2.png') }}" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Regionálny úrad verejného zdravotníctva</h5>
                                        <p>Nemocničná 12, Dolný Kubín 026 01</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/covid-cells.jpg') }}" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Aktuálne štatistiky k ochoreniu COVID-19 na Orave nájdete kliknutím na </h5><a class="h5" href=" {{ route('covid') }}" >ODKAZ.</a>
                                        <p>COVID-19 Infolinka: 043/550 48 31 a 043/550 48 25</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/budova2.png') }}" alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Lorem Ipsum</h5>
                                        <p>Default text example</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card pr-5 pl-5 pt-5 pb-5 shadow p-2 mb-3 bg-black rounded">
                            <h1 style="font-size: 25px">Vitajte na stránkach regionálneho úradu verejného zdravotníctva v Dolnom Kubíne!</h1>
                        </div>
                        <div class="row mt-10 mb-2 no-gutters" style="">
                            <div class="card text-center pr-3 pl-3 pt-3 pb-3  col-sm-4 shadow p-2 mb-3 bg-black rounded">

                                <p>
                                <h5><img src="http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/24/Places-mail-message-icon.png"> Kde nás nájdete?</h5>
                                Nemocničná 12,
                                Dolný Kubín 026 01
                                </p>

                             </div>

                            <div class="card text-center  pr-3 pl-3 pt-3 pb-3 col-sm-4  shadow p-2 mb-3 bg-black rounded">
                                <p style="font-size: 15px">
                                <h5><img src="http://icons.iconarchive.com/icons/fasticon/hand-draw-iphone/24/Clock-icon.png"> Otváracie hodiny</h5>
                                <b>Pondelok - Štvrtok</b>
                                8.00-12.00 12.30-14.00
                                <br>
                                <b>Piatok</b>
                                8.00-12.00 12.30-13.00</p>
                            </div>

                            <div class="card text-center  pr-3 pl-3 pt-3 pb-3 col-sm-4  shadow p-2 mb-3 bg-black rounded">
                                <p>
                                <h5><img src="http://icons.iconarchive.com/icons/icons8/windows-8/24/Mobile-Phone-icon.png"> Kontakt</h5>
                                Oddelenie epidemiológie:
                                <br>
                                +421 908 460 521
                                </p>
                            </div>
                        </div>


                        @if(Auth::user()!=null)
                            <div class="align-self-center mb-5">
                                <a href="{{ route('article.create') }}" class="btn btn-lg btn-dark" role="button">Pridať nový článok</a>
                            </div>
                        @endif
                    @forelse($articles->reverse()  as $article)
                        <div class="card shadow p-2 mb-3 bg-black rounded" style="margin-bottom: 30px;">
                            @if($article->img_url!=null)
                                <img class="card-img-top" src="{{ $article->img_url }}" style="height: 250px; width: 100%; object-fit: cover;" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title bg-light">{{ $article->title }}</h5>
                                @if(isset(\App\Models\User::find($article->user_id)->name))
                                    <h6 class="card-title text-muted bg-light">Autor: {{ \App\Models\User::find($article->user_id)->name }}</h6>
                                @else
                                    <h6 class="card-title text-muted bg-light">Autor: Neexistujúci používateľ</h6>
                                @endif
                                <p class="card-text bg-light">{{$article->updated_at->diffForHumans()}}</p>
                                <p class="card-text">{!!  $article->text !!}</p>
                            </div>
                            @if(Auth::user()!=null)
                                @if(Auth::user()->can('create', $article))
                                    <a href="{{ route('article.edit', [$article->id]) }}" title="Edit" class="btn btn-sm btn-light">Upraviť</a>
                                        <a href="javascript:void(0)" onclick="deleteArticle({{ $article->id }})" class="btn btn-sm btn-outline-danger">Vymazať</a>
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

    <script>
        function deleteArticle(id)
        {
            if(confirm("Chcete naozaj vymazať tento článok?"))
            {
                $.ajax({
                    url:'/sem/public/article/'+id+'/delete',
                        type:'GET',
                success:function(response)
            {
                $('#rid'+id).remove();
                location.reload();
            }
            })
            }
        }
    </script>
    @endsection
