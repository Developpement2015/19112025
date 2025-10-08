<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class TypeConge extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        "nom",
        'nom_arabe',
        'jours'
    ];




    protected static $logAttributes = ['*'];

    protected static $logName = 'Type Congé';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Type Congé');
    }
}
