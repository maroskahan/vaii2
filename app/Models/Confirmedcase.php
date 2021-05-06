<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmedcase extends Model
{
    use HasFactory;

    protected $fillable = [
        'cisloPripadu',
        'diagnoza',
        'diagnozaKod',
        'pohlavie',
        'krajBydlisko',
        'okresBydlisko',
        'obecBydlisko',
        'vek',
        'vekovaSkupinaNazov',
        'datumOchorenia',
        'datumPrijatiaHlasenia'
    ];
}
