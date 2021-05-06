<?php

namespace App\Imports;

use App\Models\Confirmedcase;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Throwable;


class ConfirmedcaseImport implements
    ToModel,
    WithStartRow,
    WithValidation,
    WithChunkReading,
    WithBatchInserts,
    SkipsOnFailure,
    SkipsOnError,
    WithUpserts
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Confirmedcase([
            'cisloPripadu' => $row[0],
            'diagnoza' => $row[1],
            'diagnozaKod' => $row[2],
            'pohlavie' => $row[7],
            'krajBydlisko' => $row[11],
            'okresBydlisko' => $row[12],
            'obecBydlisko' => $row[13],
            'datumPrijatiaHlasenia' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[16]),
            'vek' => $row[17],
            'vekovaSkupinaNazov' => $row[18],
            'datumOchorenia' =>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[42])
        ]);
    }


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 13;
    }


    public function rules(): array
    {
        return [
            '0' => 'required|numeric',
            '2' => 'required',
            '16' => 'required|numeric',
            '42' => 'required|numeric',
    ];
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }


    public function onError(Throwable $e)
    {
    }

    public function uniqueBy()
    {
        return 'cisloPripadu';
    }
}
