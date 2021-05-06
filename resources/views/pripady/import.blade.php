@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Importovať excel súbor.') }}</div>
            <div class="card-body">
                @if (session('status') == "Excel súbor importovaný úspešne")
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('status') == "Nesprávny formát súboru!")
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session()->has('errors'))
                     <div class="alert alert-danger" role="alert">
                        {{ __('Nahratý súbor má nesprávny formát! Nahrávajte iba .xls alebo .xlsx súbory!') }}
                     </div>
                @endif

                @if (session()->has('failures'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Excel súbor importovaný úspešne') }}
                    </div>
                    <div id="myDIV" style="display: none;">
                        <table class="table table-danger">
                            <tr>
                                <th class="text-break">Riadok</th>
                                <th class="text-break">Atribút</th>
                                <th class="text-break">Chyba</th>
                                <th class="text-break">Hodnota</th>
                            </tr>

                            @foreach(session()->get('failures') as $validation)
                                <tr>
                                    <td class="text-break">{{ $validation->row() }}</td>
                                    <td class="text-break">{{ $validation->attribute() }}</td>
                                    <td>
                                        <ul class="text-break">
                                            @foreach ($validation->errors() as $e)
                                                <li> {{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-break">
                                        {{ $validation->values()[$validation->attribute()] }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        {{ __('Pri validácií niektorých riadkov sa vyskytli problémy!') }}
                        <button onclick="myFunction()" class="btn btn-info ml-2">Zobraziť</button>
                    </div>

                @endif

                <form action="{{ route('pripady.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        <button type="submit" class="btn btn-primary ml-2">Importovať!</button>
                    </div>
                </form>
                <p>Poznámka: Nahrávať je možné iba súbory s príponou .xls alebo .xlsx. Súbor musí mať správnu štruktúru aby ho informačný systém vedel načítať!</p>
                <p>Posledný prípad bol aktualizovaný: {{ $lastRecordDate }}</p>
            </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

@endsection
