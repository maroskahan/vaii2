@extends('layouts.admin')

@section('content')
                <div class="card">
                    <div class="card-header">{{ __('Používatelia') }}</div>
                    <div class="card-body">
                        @can('create', \App\Models\User::class)
                            <div class="mb-3">
                                 <a href="{{ route('user.create') }}" class="btn btn-sm btn-success" role="button">Pridať nového používateľa</a>
                            </div>
                        @endcan

                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Meno</th>
                                    <th scope="col">E-mail</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $users)
                                    <tr>
                                        <td class="text-break"><b>{{ $users->id }}</b></td>
                                        <td class="text-break">{{ $users->name }}</td>
                                        <td class="text-break">{{ $users->email }}</td>

                                        <td>
                                            <a href="{{ route('user.edit', [$users->id])}}" title="Edit" class="btn btn-sm btn-primary">Upraviť</a>
                                            <a href="javascript:void(0)" onclick="deleteUser({{ $users->id }})" class="btn btn-sm btn-danger">Vymazať</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

                <script>
                    function deleteUser(id)
                    {
                        if(confirm("Chcete naozaj vymazať tohoto užívateľa?"))
                        {
                            $.ajax({
                                url:'/sem/public/admin/user/'+id+'/delete',
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
