<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Retraite extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'fonctionnaire_id',
        'type_retraite',
        'date_retraite',
        'date_effet',
        'age_retraite',
        'annees_service',
        'motif',
        'statut',
        'remarques',
        'created_by',
        'validated_by',
        'validated_at'
    ];

    protected $casts = [
        'date_retraite' => 'date',
        'date_effet' => 'date',
        'validated_at' => 'datetime',
        'age_retraite' => 'decimal:1',
        'annees_service' => 'decimal:1'
    ];

    // Types de retraite
    const TYPE_LIMITE_AGE = 'limite_age';
    const TYPE_ANTICIPEE = 'anticipee';

    // Statuts
    const STATUT_PROPOSE = 'propose';
    const STATUT_VALIDE = 'valide';
    const STATUT_REJETE = 'rejete';
    const STATUT_EFFECTUE = 'effectue';

    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function validatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'validated_by');
    }

    // Scopes
    public function scopeLimiteAge($query)
    {
        return $query->where('type_retraite', self::TYPE_LIMITE_AGE);
    }

    public function scopeAnticipee($query)
    {
        return $query->where('type_retraite', self::TYPE_ANTICIPEE);
    }

    public function scopePropose($query)
    {
        return $query->where('statut', self::STATUT_PROPOSE);
    }

    public function scopeValide($query)
    {
        return $query->where('statut', self::STATUT_VALIDE);
    }

    // Accessors
    public function getTypeRetraiteLibelleAttribute()
    {
        return match($this->type_retraite) {
            self::TYPE_LIMITE_AGE => 'Retraite limite d\'âge (' . RetirementSetting::getRetirementAgeLimit() . ' ans)',
            self::TYPE_ANTICIPEE => 'Retraite anticipée',
            default => 'Non défini'
        };
    }

    public function getStatutLibelleAttribute()
    {
        return match($this->statut) {
            self::STATUT_PROPOSE => 'Proposé',
            self::STATUT_VALIDE => 'Validé',
            self::STATUT_REJETE => 'Rejeté',
            self::STATUT_EFFECTUE => 'Effectué',
            default => 'Non défini'
        };
    }

    public function getStatutBadgeAttribute()
    {
        return match($this->statut) {
            self::STATUT_PROPOSE => 'bg-warning',
            self::STATUT_VALIDE => 'bg-success',
            self::STATUT_REJETE => 'bg-danger',
            self::STATUT_EFFECTUE => 'bg-info',
            default => 'bg-secondary'
        };
    }

    protected static $logAttributes = ['*'];
    protected static $logName = 'Retraite';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Retraite');
    }
}
