<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Region extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nom',
        'nom_arabe',
    ];



    public function villes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ville::class);
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Region';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Region');
    }

}
