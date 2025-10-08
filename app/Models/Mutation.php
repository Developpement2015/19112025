<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Mutation extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        "type_mutation_id",
        "fonctionnaire_id",
        "old_service_id",
        "new_service_id",
        "old_fonction_id",
        "new_fonction_id",
        "old_categorie_formations_id",
        "new_categorie_formations_id",
        "old_arrondissement_communes_id",
        "new_arrondissement_communes_id",
        "old_categorie_cadres_id",
        "new_categorie_cadres_id",
        "old_grades_id",
        "new_grades_id",
        "old_specialites_id",
        "new_specialites_id",
        "old_villes_id",
        "new_villes_id",
        "date_prise",
        "date_cessation",
        "observation",
        "url_note",
        "date_decision_note",

    ];

    public function type_mutation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeMutation::class, 'type_mutation_id');
    }

    public function fonctionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }

    public function old_service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class, 'old_service_id');
    }

    public function new_service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class, 'new_service_id');
    }

    public function old_fonction(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonction::class, 'old_fonction_id');
    }

    public function new_fonction(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonction::class, 'new_fonction_id');
    }

    public function old_categorie_formations(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieFormation::class, 'old_categorie_formations_id');
    }

    public function new_categorie_formations(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieFormation::class, 'new_categorie_formations_id');
    }

    public function old_arrondissement_communes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ArrondissementCommune::class, 'old_arrondissement_communes_id');
    }

    public function new_arrondissement_communes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ArrondissementCommune::class, 'new_arrondissement_communes_id');
    }

    public function old_categorie_cadres(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieCadre::class, 'old_categorie_cadres_id');
    }

    public function new_categorie_cadres(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieCadre::class, 'new_categorie_cadres_id');
    }

    public function old_grades(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Grade::class, 'old_grades_id');
    }

    public function new_grades(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Grade::class, 'new_grades_id');
    }

    public function old_specialites(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Specialite::class, 'old_specialites_id');
    }

    public function new_specialites(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Specialite::class, 'new_specialites_id');
    }

    public function old_villes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ville::class, 'old_villes_id');
    }

    public function new_villes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ville::class, 'new_villes_id');
    }




    protected static $logAttributes = ['*'];

    protected static $logName = 'Mutation';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Mutation');
    }

}
