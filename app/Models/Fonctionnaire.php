<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Relicat;
use App\Models\Certificate;
use App\Models\Greve;

class Fonctionnaire extends Model
{

    use HasFactory, LogsActivity;


    protected $fillable = [
        "ppr",
        "nom",
        "nom_arabe",
        "prenom",
        "prenom_arabe",
        "cin",
        "sexe",
        "photo",
        "date_naissance",
        "date_embauche",
        "email",
        "telephone",
        "adresse",
        "fonction_id",
        "nom_formation_sanitaire_id",
        "remarques",
        "service_id",
        "specialite_grade_id",
        "position_id",
        "type_mutation",
        "date_mutation",
        "date_prise_en_service",
        "date_note",
        "ref_note",
        "fichier_note"
    ];

    public function fonction(): BelongsTo
    {
        return $this->belongsTo(Fonction::class,'fonction_id');
    }

    public function nomFormationSanitaire(): BelongsTo
    {
        return $this->belongsTo(NomFormationSanitaire::class, 'nom_formation_sanitaire_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function specialiteGrade(): BelongsTo
    {
        return $this->belongsTo(SpecialiteGrade::class,'specialite_grade_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function typeMutation(): BelongsTo
    {
        return $this->belongsTo(TypeMutation::class, 'type_mutation');
    }

    public function historiqueMutation(): HasMany
    {
        return $this->hasMany(HistoriqueMutation::class);
    }

    public function historiquePosition(): HasMany
    {
        return $this->hasMany(PositionHistorique::class);
    }

    public function relicats(): HasMany
    {
        return $this->hasMany(Relicat::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function congeAvailabilities(): HasMany
    {
        return $this->hasMany(CongeAvailability::class);
    }

    public function greves()
    {
        return $this->hasMany(Greve::class, 'fonctionnaire_id');
    }

    public function retraites(): HasMany
    {
        return $this->hasMany(Retraite::class);
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Fonctionnaire';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Fonctionnaire');
    }

    /**
     * Get the latest mutation or position type based on the most recent date
     */
    public function getLatestMutationTypeAttribute()
    {
        // Get the latest mutation
        $latestMutation = $this->historiqueMutation()
            ->whereNotNull('date_mutation')
            ->orderBy('date_mutation', 'desc')
            ->first();

        // Get the latest position
        $latestPosition = $this->historiquePosition()
            ->whereNotNull('date_prise_en_service')
            ->orderBy('date_prise_en_service', 'desc')
            ->first();

        // Compare dates to find the most recent
        $latestMutationDate = $latestMutation ? \Carbon\Carbon::parse($latestMutation->date_mutation) : null;
        $latestPositionDate = $latestPosition ? \Carbon\Carbon::parse($latestPosition->date_prise_en_service) : null;

        // If both exist, compare dates
        if ($latestMutationDate && $latestPositionDate) {
            if ($latestMutationDate->greaterThan($latestPositionDate)) {
                return $latestMutation->typeMutation ? $latestMutation->typeMutation->nom : 'Mutation';
            } else {
                return $latestPosition->nouveauxPosition ? $latestPosition->nouveauxPosition->nom : 'Position';
            }
        }

        // If only mutation exists
        if ($latestMutationDate) {
            return $latestMutation->typeMutation ? $latestMutation->typeMutation->nom : 'Mutation';
        }

        // If only position exists
        if ($latestPositionDate) {
            return $latestPosition->nouveauxPosition ? $latestPosition->nouveauxPosition->nom : 'Position';
        }

        // Fallback to original type_mutation or 'Recrutement'
        return $this->typeMutation ? $this->typeMutation->nom : 'Recrutement';
    }

    /**
     * Get the latest mutation or position date
     */
    public function getLatestMutationDateAttribute()
    {
        // Get the latest mutation
        $latestMutation = $this->historiqueMutation()
            ->whereNotNull('date_mutation')
            ->orderBy('date_mutation', 'desc')
            ->first();

        // Get the latest position
        $latestPosition = $this->historiquePosition()
            ->whereNotNull('date_prise_en_service')
            ->orderBy('date_prise_en_service', 'desc')
            ->first();

        // Compare dates to find the most recent
        $latestMutationDate = $latestMutation ? \Carbon\Carbon::parse($latestMutation->date_mutation) : null;
        $latestPositionDate = $latestPosition ? \Carbon\Carbon::parse($latestPosition->date_prise_en_service) : null;

        // Return the most recent date
        if ($latestMutationDate && $latestPositionDate) {
            return $latestMutationDate->greaterThan($latestPositionDate) ? $latestMutationDate : $latestPositionDate;
        }

        if ($latestMutationDate) {
            return $latestMutationDate;
        }

        if ($latestPositionDate) {
            return $latestPositionDate;
        }

        // Fallback to original date_mutation or date_embauche
        return $this->date_mutation ? \Carbon\Carbon::parse($this->date_mutation) : \Carbon\Carbon::parse($this->date_embauche);
    }

    /**
     * Get the latest service ID from history tables
     */
    public function getLatestServiceIdAttribute()
    {
        // Get the latest mutation with nouveau_service_id
        $latestMutation = $this->historiqueMutation()
            ->whereNotNull('nouveau_service_id')
            ->whereNotNull('date_mutation')
            ->orderBy('date_mutation', 'desc')
            ->first();

        if ($latestMutation) {
            return $latestMutation->nouveau_service_id;
        }

        // Fallback to original service_id
        return $this->service_id;
    }

    /**
     * Get the latest position ID from history tables
     */
    public function getLatestPositionIdAttribute()
    {
        // Get the latest position with nouveaux_position_id
        $latestPosition = $this->historiquePosition()
            ->whereNotNull('nouveaux_position_id')
            ->whereNotNull('date_prise_en_service')
            ->orderBy('date_prise_en_service', 'desc')
            ->first();

        if ($latestPosition) {
            return $latestPosition->nouveaux_position_id;
        }

        // Fallback to original position_id
        return $this->position_id;
    }

    /**
     * Get the latest specialite grade ID from history tables
     */
    public function getLatestSpecialiteGradeIdAttribute()
    {
        // Get the latest mutation with nouveau_specialite_id
        $latestMutation = $this->historiqueMutation()
            ->whereNotNull('nouveau_specialite_id')
            ->whereNotNull('date_mutation')
            ->orderBy('date_mutation', 'desc')
            ->first();

        if ($latestMutation) {
            return $latestMutation->nouveau_specialite_id;
        }

        // Fallback to original specialite_grade_id
        return $this->specialite_grade_id;
    }

    /**
     * Get the latest service start date (dernière prise de service)
     * Checks both mutation and position history for the most recent date_prise_en_service
     */
    public function getLatestServiceStartDateAttribute()
    {
        // Get the latest mutation with date_prise_en_service
        $latestMutationService = $this->historiqueMutation()
            ->whereNotNull('date_prise_en_service')
            ->orderBy('date_prise_en_service', 'desc')
            ->first();

        // Get the latest position with date_prise_en_service
        $latestPositionService = $this->historiquePosition()
            ->whereNotNull('date_prise_en_service')
            ->orderBy('date_prise_en_service', 'desc')
            ->first();

        // Compare dates to find the most recent service start date
        $latestMutationServiceDate = $latestMutationService ? \Carbon\Carbon::parse($latestMutationService->date_prise_en_service) : null;
        $latestPositionServiceDate = $latestPositionService ? \Carbon\Carbon::parse($latestPositionService->date_prise_en_service) : null;

        // Return the most recent service start date
        if ($latestMutationServiceDate && $latestPositionServiceDate) {
            return $latestMutationServiceDate->greaterThan($latestPositionServiceDate) ? $latestMutationServiceDate : $latestPositionServiceDate;
        }

        if ($latestMutationServiceDate) {
            return $latestMutationServiceDate;
        }

        if ($latestPositionServiceDate) {
            return $latestPositionServiceDate;
        }

        // Fallback to original date_prise_en_service or date_embauche
        return $this->date_prise_en_service ? \Carbon\Carbon::parse($this->date_prise_en_service) : \Carbon\Carbon::parse($this->date_embauche);
    }

}
