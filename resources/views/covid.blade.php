@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: rgba(255,255,255,1);">
        <div class="card text-center" style="">
            <h1 style="" class="pr-5 pl-5 pt-5 pb-5">Štatistiky k ochoreniu COVID-19 v regióne Orava</h1>
        </div>
        <div class="row justify-content-center">
            <div class="card text-center pr-3 pl-3 pt-3 pb-3 mr-3 col-sm-3 shadow p-2 mb-3 bg-black rounded">
                <p>
                {{ __('Počet nových prípadov za posledný týždeň') }}
                <h2><span class="count">{{ $weekCaseCount }}</span></h2>
                </p>
            </div>

            <div class="card text-center pr-3 pl-3 pt-3 pb-3 mr-3 col-sm-3 shadow p-2 mb-3 bg-black rounded">
                <p>
                {{ __('Počet nových prípadov za posledný mesiac') }}
                <h2><span class="count">{{ $monthCaseCount }}</span></h2>
                </p>
            </div>

            <div class="card text-center pr-3 pl-3 pt-3 pb-3 col-sm-3 shadow p-2 mb-3 bg-black rounded">
                <p>
                {{ __('Celkový počet potvrdených prípadov (od začiatku evidencie)') }}
                <h2><span class="count">{{ $allCount }}</span></h2>
                </p>
            </div>


        </div>


        <div class="card justify-content-center m-3">
            <h3 class="text-center text-danger">COVID INFOLINKA: 043/550 48 31 a 043/550 48 25</h3>
            <p class="text-center">Porušovanie protiepidemických opatrení na pracoviskách alebo porušovanie dodržiavania opatrení v súvislosti s ochorením COVID-19 môžete nahlásiť e-mailom na: dk.podnety@uvzsr.sk</p>
        </div>

        <div class="card">
            <div id="map"></div>
        </div>

        <div class="card mb-5 mt-5">
            {{ $chartDistricts->container() }}
        </div>

        <div class="row justify-content-center mt-3 mb-3">
            <div class="card mb-3 mr-2 col-sm-5">
                {{ $chart->container() }}
            </div>
            <div class="card mb-3 mr-2 col-sm-5">
                {{ $chartAge->container() }}
            </div>
        </div>




        <div class="row justify-content-center mt-3">
            <div class="card mb-3 mr-2 col-sm-5">
                <h5>{{ __('Počet celkových potvrdených prípadov v jednotlivých obciach') }}</h5>
                <div class="card-body">
                    <table id="data" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Názov obce</th>
                            <th scope="col">Počet potvrdených prípadov</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($citiesCaseCount as $citiesCaseCount)
                            <tr>
                                <td><b>{{ $citiesCaseCount->obecBydlisko }}</b></td>
                                <td>{{ $citiesCaseCount->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card mb-3 col-sm-5">
                <h5>{{ __('Veková špecifikácia celkových potvrdených prípadov') }}</h5>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Veková skupina</th>
                            <th scope="col">Počet potvrdených prípadov</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ageSpecification as $ages)
                            <tr>
                                <td><b>{{ $ages->vekovaSkupinaNazov }}</b></td>
                                <td>{{ $ages->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-5 mt-5">
            {{ $chartGender->container() }}
        </div>

        <div class="card mb-3">
            <h5>{{ __('Počet celkových potvrdených prípadov u mužov a žien') }}</h5>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Pohlavie</th>
                        <th scope="col">Počet potvrdených prípadov</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($menWomenCount as $menWomenCount)
                        <tr>
                            <td><b>{{ $menWomenCount->pohlavie }}</b></td>
                            <td>{{ $menWomenCount->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-5 mt-5">
            {{ $chartAGPCR->container() }}
        </div>

    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

    <link href="{{ asset('css/map.css') }}" rel="stylesheet">

    <script src="{{ asset('js/counter_effect.js') }}"></script>
    <script src="{{ $chartAge->cdn() }}"></script>
    {{ $chartAge->script() }}
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $chartDistricts->cdn() }}"></script>
    {{ $chartDistricts->script() }}
    <script src="{{ $chartGender->cdn() }}"></script>
    {{ $chartGender->script() }}
    <script src="{{ $chartAGPCR->cdn() }}"></script>
    {{ $chartAGPCR->script() }}

    <script>
        <?php
        use Illuminate\Support\Facades\DB;
        $pole = DB::table('confirmedcases')->select('obecBydlisko', 'krajBydlisko', 'okresBydlisko', DB::raw('count(*) as total'))
            ->whereIn('obecBydlisko', ['Nižná (TS)','Dolný Kubín','Bziny','Dlhá nad Oravou','Horná Lehota (DK)','Chlebnice','Istebné','Jasenová','Kraľovany',
                'Krivá','Leštiny','Malatiná','Medzibrodie nad Oravou','Oravská Poruba','Oravský Podzámok','Osádka','Párnica','Pokryváč','Pribiš','Pucov','Sedliacka Dubová',
                'Veličná','Vyšný Kubín','Zázrivá','Žaškov', 'Námestovo','Babín','Beňadovo','Bobrov','Breza','Hruštín','Klin','Krušetnica','Lokca','Lomná','Mútne','Novoť',
                'Oravská Jasenica','Oravská Lesná', 'Oravská Polhora','Oravské Veselé','Rabča','Rabčice','Sihelné','Ťapešovo','Vasiľov','Vavrečka','Zákamenné','Zubrohlava',
                'Valaská Dubová','Trstená', 'Tvrdošín','Brezovica (TS)','Čimhová','Habovka','Hladovka','Liesek','Oravský Biely Potok','Podbiel','Suchá Hora',
                'Štefanov nad Oravou','Vitanová','Zábiedovo', 'Zuberec'])
            ->groupBy('obecBydlisko', 'krajBydlisko', 'okresBydlisko')
            ->get();


        $data = array();
        foreach ($pole as $obec)
        {
            $data[ trim($obec->obecBydlisko) ] = array(
                'nazov' => $obec->obecBydlisko,
                'total' => $obec->total,
                'kraj' => $obec->krajBydlisko,
                'okres' => $obec->okresBydlisko
            );
        }
        $temp["data"]=$data;

        echo "var oravazDB = " . json_encode($temp) . ";";
        ?>
    </script>

    <script src="{{ asset('js/mapa_oravy.js') }}"></script>
    <script src="{{ asset('js/pages.js') }}"></script>

@endsection
