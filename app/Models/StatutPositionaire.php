<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class StatutPositionaire extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
    ];


    public function typesMutations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TypeMutation::class);
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Statut Positionaire';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Statut Positionaire');
    }

}
