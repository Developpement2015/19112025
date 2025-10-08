<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Specialite extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        "nom",
        'nom_arabe',
        "categorie_cadre_id"
    ];

    public function categorie_cadre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieCadre::class, 'categorie_cadre_id');
    }



    protected static $logAttributes = ['*'];

    protected static $logName = 'Specialité';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Specialité');
    }
}
