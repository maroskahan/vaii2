<?php

namespace App\Http\Controllers;

use App\Imports\ConfirmedcaseImport;
use App\Models\Confirmedcase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Validator;

class ConfirmedcaseImportController extends Controller
{
    public function show() {


        $lastRecordDate = Confirmedcase::all('updated_at')->max('updated_at');

        return view('pripady.import' , [
            'lastRecordDate' => Carbon::createFromTimestamp(strtotime($lastRecordDate))
                ->timezone('Europe/Bratislava')
                ->toDateTimeString()
        ]);
    }

    public function store(Request $request) {
        $file = $request->file('file');

        $validator = Validator::make(
            [
                'file'      => $request->file,
                'extension' => strtolower($request->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:xlsx,xls',
            ]
        );

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        try {
            $import = new ConfirmedcaseImport;
            $import->import($file);
            if($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
        } catch (NoTypeDetectedException $e) {
            return back()->withStatus('Nesprávny formát súboru!');
        }

        return back()->withStatus('Excel súbor importovaný úspešne');
    }
}
