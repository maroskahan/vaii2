@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Články') }}</div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('article.create') }}" class="btn btn-sm btn-success" role="button">Pridať nový článok</a>
            </div>

                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID Článku</th>
                        <th scope="col">Názov článku</th>
                        <th scope="col">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $articles)
                        <tr>
                            <td class="text-break"><b>{{ $articles->id }}</b></td>
                            <td class="text-break">{{ $articles->title }}</td>

                            <td>
                                <a href="{{ route('article.edit', [$articles->id])}}" title="Edit" class="btn btn-sm btn-primary">Upraviť</a>
                                <a href="javascript:void(0)" onclick="deleteArticle({{ $articles->id }})" class="btn btn-sm btn-danger">Vymazať</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
