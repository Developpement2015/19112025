<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Ville extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['nom','nom_arabe', 'region_id'];

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function arrondissementCommunes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ArrondissementCommune::class, 'ville_id');
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Ville';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Ville');
    }

}
