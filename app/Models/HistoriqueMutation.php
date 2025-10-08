<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class HistoriqueMutation extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'fonctionnaire_id',
        'type_mutation_id',
        'date_mutation',
        'date_note',
        'ref_note',
        'fichiers_notes',
        'formation_sanitaire_origine_id',
        'formation_sanitaire_destination_id',
        'remarque',
        'date_prise_en_service',
        'date_cessation_service',
        'ancien_service_id',
        'nouveau_service_id',
        'ancien_fonction_id',
        'nouveau_fonction_id',
        'ancien_specialite_id',
        'nouveau_specialite_id'

    ];

    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class,'fonctionnaire_id');
    }

    public function typeMutation(): BelongsTo
    {
        return $this->belongsTo(TypeMutation::class,'type_mutation_id');
    }

    public function formationSanitaireOrigine(): BelongsTo
    {
        return $this->belongsTo(NomFormationSanitaire::class,'formation_sanitaire_origine_id');
    }

    public function formationSanitaireDestination(): BelongsTo
    {
        return $this->belongsTo(NomFormationSanitaire::class,'formation_sanitaire_destination_id');
    }

    public function ancienService(): BelongsTo
    {
        return $this->belongsTo(Service::class,'ancien_service_id');
    }

    public function nouveauService(): BelongsTo
    {
        return $this->belongsTo(Service::class,'nouveau_service_id');
    }

    public function ancienFonction(): BelongsTo
    {
        return $this->belongsTo(Fonction::class,'ancien_fonction_id');
    }

    public function nouveauFonction(): BelongsTo
    {
        return $this->belongsTo(Fonction::class,'nouveau_fonction_id');
    }

    public function ancienSpecialite(): BelongsTo
    {
        return $this->belongsTo(SpecialiteGrade::class,'ancien_specialite_id');
    }

    public function nouveauSpecialite(): BelongsTo
    {
        return $this->belongsTo(SpecialiteGrade::class,'nouveau_specialite_id');
    }




    protected static $logAttributes = ['*'];

    protected static $logName = 'HistoriqueMutation';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('HistoriqueMutation');
    }
}
