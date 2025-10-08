<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Affectation extends Model
{

    use HasFactory, LogsActivity;


    protected $fillable = [
        "fonctionnaire_id",
        "formation_arrondissement_commune_id",
        "categorie_formation_id",
        "service_id",
        "fonction_id",
        "date_affectation",
    ];


    public function fonctionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo

    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }


    public function formation_arrondissement_commune(): \Illuminate\Database\Eloquent\Relations\BelongsTo

    {
        return $this->belongsTo(FormationArrondissementCommune::class, 'formation_arrondissement_commune_id');
    }


    public function categorie_formation(): \Illuminate\Database\Eloquent\Relations\BelongsTo

    {
        return $this->belongsTo(CategorieFormation::class, 'categorie_formation_id');
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo

    {
        return $this->belongsTo(Service::class, 'service_id');
    }


    public function fonction(): \Illuminate\Database\Eloquent\Relations\BelongsTo

    {
        return $this->belongsTo(Fonction::class, 'fonction_id');
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Service';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Service');
    }
}
