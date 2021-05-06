<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id('cisloPripadu');
            $table->text('diagnoza');
            $table->string('diagnozaKod', 20);
            //$table->text('klasifikaciaPripadu');
            //$table->text('stavPripadu');
            //$table->text('priezvisko');
            //$table->text('meno');
            $table->string('pohlavie', 100);
            //$table->text('cudzinec');
            //$table->text('rodneCislo');
            //$table->text('ulica');
            $table->string('krajBydlisko', 100);
            $table->string('okresBydlisko', 100);
            $table->string('obecBydlisko', 100);
            //$table->integer('psc');
            //$table->dateTime('datumNarodenia');
            //$table->dateTime('datumPrijatiaHlasenia');
            $table->integer('vek');
            $table->string('vekovaSkupinaNazov', 20);
            //$table->integer('vekMesDetiDoRoka');
            //$table->integer('cisloVrodine');
            //$table->text('povolanie');
            //$table->text('kolektiv');
            //$table->text('nazovKolekZariad');
            //$table->int('dlzkaHospitalizacie');
            //$table->text('sposobZistOchorenia');
            //$table->text('krajinaNakazy');
            //$table->text('krajNakazy');
            //$table->text('okresNakazy');
            //$table->text('obecNakazy');
            //$table->text('charakterVyskytu');
            //$table->text('epidemia');
            //$table->text('socProstredie');
            //$table->text('dopadOchorenia');
            //$table->text('ockovanie');
            //$table->boolean('jeProfesionNakaza');
            //$table->boolean('jeNozokomNakaza');
            //$table->boolean('jeImportNakaza');
            //$table->text('prijmovaDiagNemoc');
            //$table->text('nozokomialneNakazy');
            //$table->text('oddelNozokNakazy');
            //$table->text('miestoIzolacie');
            $table->dateTime('datumOchorenia');
            $table->dateTime('datumPrijatiaHlasenia');
            //$table->int('tyzdenHlasenia');
            //$table->dateTime('datumIzolacie');
            //$table->text('klinickaForma');
            //$table->boolean('zvysenyZdravotnyDohlad');
            //$table->boolean('jeSentinelLekar');
            //$table->text('setrenieVOhnisku');
            //$table->text('pramenNakazy');
            //$table->text('pramenDokaz');
            //$table->text('mechanizmusPrenosu');
            //$table->text('faktorPrenosu');
            //$table->text('faktorDokaz');
            //$table->text('krajinaPotraviny');
            //$table->text('miestoNakazy');
            //$table->dateTime('datumKonzumPotr');
            //$table->dateTime('datumUmrtia');
            //$table->text('pitva');
            //$table->text('diagnozaSmrti');
            //$table->int('pocetDavokOckovania');
            //$table->dateTime('datumOckovania');
            //$table->text('intervalOdPoslOckovania');
            //$table->text('druhVakciny');
            //$table->dateTime('datumRozhodPriznakov');
            //$table->int('trvanieRozhodPriznakov');
            //$table->text('rizikovyFaktor');
            //$table->boolean('prekonalPodobInfOchor');
            //$table->text('kedyPodobInfOchorenie');
            //$table->boolean('prekonalRizikInfOchor');
            //$table->text('kedyRizikInfOchor');
            //$table->int('tehotenstvoMesiac');
            //$table->dateTime('cestovalOd');
            //$table->dateTime('cestovalDo');
            //$table->dateTime('datumVykonu');
            //$table->text('intervalOdVykonu');
            //$table->text('miestoVykonu');
            //$table->text('parentVykon');
            //$table->text('pracoviskoNakazy');
            //$table->dateTime('datumPrijatiaNemoc');
            //$table->text('lokalizInfekcie');
            //$table->text('lokalizPoranenia');
            //$table->text('zvieraVysetrene');
            //$table->text('druhZvierata');
            //$table->text('antiarabickeSerum');
            //$table->text('tetanickyAnatoxin');
            //$table->text('postvakcinReakcia');
            //$table->text('miestoKontFaktoru');
            //$table->text('sposPodavJedla');
            //$table->int('dlzkaOchorenia');
            //$table->int('inkubacnyCas');
            //$table->text('indikOchorenie');
            //$table->text('terapia');
            //$table->dateTime('datumOdberu');
            //$table->dateTime('datumPrijatia');
            //$table->dateTime('datumVysetrenia');
            //$table->text('druhMaterialu1');
            //$table->text('test1');
            //$table->text('vysledokLabVysetr1');
            //$table->text('druhMaterialu2');
            //$table->text('test2');
            //$table->text('vysledokLabVysetr2');
            //$table->text('agens');
            //$table->text('agensSpec2');
            //$table->text('agensSpec3');
            //$table->text('vedlAgens');
            //$table->text('charaktKmena');
            //$table->text('pripadZaevidoval');
            //$table->text('druhOchorenia');
            //$table->boolean('jeImportSuvis');
            //$table->int('cisloSuvisiacehoPripadu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
