<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Stage extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nom_prenom',
        'cin',
        'institut_details',
        'duree',
        'date_debut',
        'date_fin',
        'hierarchie',
        'avis',
        'statut_attestation',
        'cadre',
        'type_stage',
        'type_stage_id',
        'ecole_id',
        'option_id',
        'service_id',
        'formation_sanitaire_id',
        'encadrant_id',
        'intitule_formation_id',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    // Relations
    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function formationSanitaire()
    {
        return $this->belongsTo(NomFormationSanitaire::class, 'formation_sanitaire_id');
    }

    public function encadrant()
    {
        return $this->belongsTo(Encadrant::class);
    }

    public function intituleFormation()
    {
        return $this->belongsTo(IntituleFormation::class);
    }

    public function typeStage()
    {
        return $this->belongsTo(TypeStage::class);
    }

    protected static $logAttributes = ['*'];
    protected static $logName = 'Stage';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Stage');
    }
}
