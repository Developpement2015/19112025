<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class HistoriquePopulation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        "nom_formation_sanitaire_id",
        "population",
        "annee",
    ];

    protected static $logAttributes = ['*'];

    protected static $logName = 'HistoriquePopulation';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions

    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('HistoriquePopulation');
    }
}
