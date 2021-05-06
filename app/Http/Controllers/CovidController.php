<?php

namespace App\Http\Controllers;

use App\Models\Confirmedcase;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use DateTime;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    public function index()
    {
        $poleObci = ['Nižná (TS)','Dolný Kubín','Bziny','Dlhá nad Oravou','Horná Lehota (DK)','Chlebnice','Istebné','Jasenová','Kraľovany',
            'Krivá','Leštiny','Malatiná','Medzibrodie nad Oravou','Oravská Poruba','Oravský Podzámok','Osádka','Párnica','Pokryváč','Pribiš','Pucov','Sedliacka Dubová',
            'Veličná','Vyšný Kubín','Zázrivá','Žaškov', 'Námestovo','Babín','Beňadovo','Bobrov','Breza','Hruštín','Klin','Krušetnica','Lokca','Lomná','Mútne','Novoť',
            'Oravská Jasenica','Oravská Lesná', 'Oravská Polhora','Oravské Veselé','Rabča','Rabčice','Sihelné','Ťapešovo','Vasiľov','Vavrečka','Zákamenné','Zubrohlava',
            'Valaská Dubová','Trstená', 'Tvrdošín','Brezovica (TS)','Čimhová','Habovka','Hladovka','Liesek','Oravský Biely Potok','Podbiel','Suchá Hora',
            'Štefanov nad Oravou','Vitanová','Zábiedovo', 'Zuberec'];

        $date = new DateTime();
        $date->modify('-4 weeks');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $confirmedcases = DB::table('confirmedcases')->where('datumOchorenia', '>=', $formatted_date)->get();
        $monthCaseCount = count($confirmedcases);

        $date = new DateTime();
        $date->modify('-1 weeks');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $confirmedcases = DB::table('confirmedcases')->where('datumOchorenia', '>=', $formatted_date)->get();
        $weekCaseCount= count($confirmedcases);


        $allCount = count(DB::table('confirmedcases')->get());

        $ageSpecification = DB::table('confirmedcases')->select('vekovaSkupinaNazov', DB::raw('count(*) as total'))
            ->whereIn('vekovaSkupinaNazov', ['0', '15-19', '20-24', '25-34', '35-44', '45-54', '55-64', '65+'] )
            ->groupBy('vekovaSkupinaNazov')
            ->get();

        $menWomenCount = DB::table('confirmedcases')->select('pohlavie', DB::raw('count(*) as total'))
            ->whereNotIn('pohlavie', ['null', 'nezisťované'] )
            ->groupBy('pohlavie')
            ->get();


        $citiesCaseCount = DB::table('confirmedcases')->select('obecBydlisko', DB::raw('count(*) as total'))
            ->whereIn('obecBydlisko', $poleObci)
            ->groupBy('obecBydlisko')
            ->get();

        $countM = Confirmedcase::where('pohlavie','=','žena')->count();
        $countW = Confirmedcase::where('pohlavie','=','muž')->count();
        $chart = (new LarapexChart)->setTitle('Pohlavie potvrdených prípadov')
            ->setSubtitle('Dáta sú čerpané z epidemiologického informačného systému.')
            ->setColors(['#ffc63b', '#ff6384'])
            ->setLabels(['Muži', 'Ženy'])
            ->setDataset([$countM, $countW]);


        $count0 = Confirmedcase::where('vekovaSkupinaNazov','=','0')->count();
        $count05 = Confirmedcase::where('vekovaSkupinaNazov','=','44287')->count();
        $count59 = Confirmedcase::where('vekovaSkupinaNazov','=','44444')->count();
        $count1014 = Confirmedcase::where('vekovaSkupinaNazov','=','41913')->count();
        $count1519 = Confirmedcase::where('vekovaSkupinaNazov','=','15-19')->count();
        $count2024 = Confirmedcase::where('vekovaSkupinaNazov','=','20-24')->count();
        $count2534 = Confirmedcase::where('vekovaSkupinaNazov','=','25-34')->count();
        $count3544 = Confirmedcase::where('vekovaSkupinaNazov','=','35-44')->count();
        $count4554 = Confirmedcase::where('vekovaSkupinaNazov','=','45-54')->count();
        $count5564 = Confirmedcase::where('vekovaSkupinaNazov','=','55-64')->count();
        $count65 = Confirmedcase::where('vekovaSkupinaNazov','=','65+')->count();
        $chartAge = (new LarapexChart)->setTitle('Veková špecifikácia nakazených')
            ->setSubtitle('Dáta sú čerpané z epidemiologického informačného systému.')
            ->setLabels(['0', '0-5', '5-9', '10-14', '15-19', '20-24', '25-34', '35-44', '45-54', '55-64', '65+'])
            ->setDataset([$count0, $count05, $count59, $count1014, $count1519, $count2024, $count2534, $count3544, $count4554, $count5564, $count65]);

        $countDK = Confirmedcase::where('okresBydlisko','=','DK')->count();
        $countTS = Confirmedcase::where('okresBydlisko','=','TS')->count();
        $countNO = Confirmedcase::where('okresBydlisko','=','NO')->count();
        $chartDistricts = (new LarapexChart)->barChart()
            ->setTitle('Počet nakazených v jednotlivých okresoch')
            ->setSubtitle('Dáta sú čerpané z epidemiologického informačného systému.')
            ->setXAxis(['Okres Námestovo', 'Okres Dolný Kubín', 'Okres Tvrdošín'])
            ->addData('COVID-19', [$countNO, $countDK, $countTS]);

        $countDK = Confirmedcase::where('okresBydlisko','=','DK')->count();
        $countTS = Confirmedcase::where('okresBydlisko','=','TS')->count();
        $countNO = Confirmedcase::where('okresBydlisko','=','NO')->count();
        $chartDistricts = (new LarapexChart)->barChart()
            ->setTitle('Počet celkových nakazených v jednotlivých okresoch')
            ->setSubtitle('Dáta sú čerpané z epidemiologického informačného systému.')
            ->setXAxis(['Okres Námestovo', 'Okres Dolný Kubín', 'Okres Tvrdošín'])
            ->addData('COVID-19', [$countNO, $countDK, $countTS])
            ->setColors(['#ff0000']);

        $countDKW = Confirmedcase::where('okresBydlisko','=','DK')->where('pohlavie', '=', 'žena')->count();
        $countDKM = Confirmedcase::where('okresBydlisko','=','DK')->where('pohlavie', '=', 'muž')->count();
        $countNOW = Confirmedcase::where('okresBydlisko','=','NO')->where('pohlavie', '=', 'žena')->count();
        $countNOM = Confirmedcase::where('okresBydlisko','=','NO')->where('pohlavie', '=', 'muž')->count();
        $countTSW = Confirmedcase::where('okresBydlisko','=','TS')->where('pohlavie', '=', 'žena')->count();
        $countTSM = Confirmedcase::where('okresBydlisko','=','TS')->where('pohlavie', '=', 'muž')->count();
        $chartGender = (new LarapexChart)->horizontalBarChart()
            ->setTitle('Počet celkových nakazených mužov/žien v jednotlivých okresoch')
            ->setSubtitle('Dáta sú čerpané z epidemiologického informačného systému.')
            ->setXAxis(['Okres Námestovo', 'Okres Dolný Kubín', 'Okres Tvrdošín'])
            ->addData('Muži', [$countNOM, $countDKM, $countTSM])
            ->addData('Ženy', [$countNOW, $countDKW, $countTSW])
            ->setColors(['#ffc63b', '#ff6384']);


        $countPCR = Confirmedcase::where('diagnozaKod','=','U071')->count();
        $countAG = Confirmedcase::where('diagnozaKod','=','U0711')->count();
        $chartAGPCR = (new LarapexChart)->setTitle('Počet pozitívnych antigénovým testom / PCR testom')
            ->setSubtitle('Dáta sú čerpané z epidemiologického informačného systému.')
            ->setColors(['#E67E22', '#F4D03F'])
            ->setLabels(['PCR', 'AG'])
            ->setDataset([$countPCR, $countAG]);




        return view('covid', [
            'ageSpecification' => $ageSpecification,
            'menWomenCount' => $menWomenCount,
            'citiesCaseCount' => $citiesCaseCount,
            'monthCaseCount' => $monthCaseCount,
            'allCount' => $allCount,
            'chart' => $chart,
            'chartAge' => $chartAge,
            'chartDistricts' => $chartDistricts,
            'chartGender' => $chartGender,
            'chartAGPCR' => $chartAGPCR,
            'weekCaseCount' => $weekCaseCount
        ]);


    }
}
